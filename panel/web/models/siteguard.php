<?php

class SiteGuard
{
	const FILE_RECONFIG = 'C:/JP-Secure/SiteGuard Lite/reconfig.bat';
	const FILE_SIG_CUSTOM = 'C:/JP-Secure/SiteGuard Lite/conf/waf/sig_custom.txt';
	const FILE_DETECT_LOG = 'C:/JP-Secure/SiteGuard Lite/logs/http/detect.log';
	const FILE_FORM_LOG = 'C:/JP-Secure/SiteGuard Lite/logs/http/form.log';

	const ACTION_WHITE = 1;
	const ACTION_MONITOR = 2;
	const ACTION_BLOCK = 3;
	private static $_action_table = [
		self::ACTION_WHITE => 'WHITE',
		self::ACTION_MONITOR => 'MONITOR',
		self::ACTION_BLOCK => 'BLOCK'
	];

	const TARGET_URL = 1;
	const TARGET_PATH = 2;
	const TARGET_CLIENT_ADDR = 3;
	const TARGET_SERVER_ADDR = 4;
	private static $_target_table = [
		self::TARGET_URL => 'URL',
		self::TARGET_PATH => 'PATH',
		self::TARGET_CLIENT_ADDR => 'CLIENT_ADDR',
		self::TARGET_SERVER_ADDR => 'SERVER_ADDR'
	];

	const METHOD_COUNTER_60_1 = 1;
	const METHOD_PCRE_CASELESS = 2;
	const METHOD_NOT = 3;
	private static $_method_table = [
		self::METHOD_COUNTER_60_1 => 'COUNTER(60:1)',
		self::METHOD_PCRE_CASELESS => 'PCRE_CASELESS',
		self::METHOD_NOT => 'NOT'
	];
	
	function __construct()
	{
		require_once("config/all.php");
	}
	
	function reconfig()
	{
		return exec("cmd.exe /C \"". $this::FILE_RECONFIG . "\"");
	}
	
	function read($file_path)
	{
		$fp = fopen($file_path, 'r');
		if ( ! $fp || ! flock($fp, LOCK_SH) )
		{
			fclose($fp);
			return FALSE;
		}
		
		$lines = [];
		while ($line = fgets($fp))
		{
			$tmp = rtrim($line);
			if ( ! empty($tmp) )
			{
				$lines[] = $tmp;
			}
		}
		
		fclose($fp);
		return $lines;
	}
	
	function write($file_path, $text)
	{
		$fp = fopen($file_path, 'w');
		if ( ! $fp || ! flock($fp, LOCK_EX) )
		{
			fclose($fp);
			return FALSE;
		}
		
		ftruncate($fp, 0);
		$result = fwrite($fp, $text);
		fflush($fp);
		
		fclose($fp);
		$this->reconfig();
		return $result;
	}
	
	function add($file_path, $text)
	{
		$fp = fopen($file_path, 'a');
		if ( ! $fp || ! flock($fp, LOCK_EX) )
		{
			fclose($fp);
			return FALSE;
		}
		
		$result = fwrite($fp, $text);
		fflush($fp);
		
		fclose($fp);
		$this->reconfig();
		return $result;
	}
	
	function add_sig($domain, $action_id, $target_id, $method_ids, $string)
	{
		if (empty($domain) || empty($string))
		{
			return FALSE;
		}
		$comment = $domain;
		$sig_name = preg_replace('/[\.|_]/', '-', $domain) . '_' . time();
		
		if (! array_key_exists($action_id, static::$_action_table))
		{
			return FALSE;
		}
		$action = static::$_action_table[$action_id];
		
		if (! array_key_exists($target_id, static::$_target_table))
		{
			return FALSE;
		}
		$target = static::$_target_table[$target_id];
		
		$method = [];
		foreach (explode(',', $method_ids) as $method_id)
		{
			if (array_key_exists($method_id, static::$_method_table))
			{
				$method[] = static::$_method_table[$method_id];
			}
		}
		if (empty($method))
		{
			return FALSE;
		}
		$method = implode(',', $method);
		
		$sig = "ON\t{$action}\t\t{$sig_name}\t{$target}\t{$method}\t{$string}\t\t{$comment}\n";
		return $this->add($this::FILE_SIG_CUSTOM, $sig);
	}
	
	function update_sig($sig_name, $domain, $action_id, $target_id, $method_ids, $string)
	{
		if (empty($sig_name) || empty($domain) || empty($string))
		{
			return FALSE;
		}
		$comment = $domain;
		
		$action_id = intval($action_id);
		if (! array_key_exists($action_id, static::$_action_table))
		{
			return FALSE;
		}
		$action = static::$_action_table[$action_id];
		
		$target_id = intval($target_id);
		if (! array_key_exists($target_id, static::$_target_table))
		{
			return FALSE;
		}
		$target = static::$_target_table[$target_id];
		
		$method = [];
		foreach (explode(',', $method_ids) as $method_id)
		{
			if (array_key_exists($method_id, static::$_method_table))
			{
				$method[] = static::$_method_table[$method_id];
			}
		}
		if (empty($method))
		{
			return FALSE;
		}
		$method = implode(',', $method);
		
		$sig = "ON\t{$action}\t\t{$sig_name}\t{$target}\t{$method}\t{$string}\t\t{$comment}\n";
		
		$text = '';
		foreach($this->read($this::FILE_SIG_CUSTOM) as $line)
		{
			$row = explode("\t", $line);
			if (count($row) == 9 && trim($row[3]) == $sig_name)
			{
				$text .= $sig;
			}
			else
			{
				$text .= $line . "\n";
			}
		}
		
		return $this->write($this::FILE_SIG_CUSTOM, $text);
	}
	
	function get_sigs($domain)
	{
		$result = [];
		foreach($this->read($this::FILE_SIG_CUSTOM) as $line)
		{
			$row = explode("\t", $line);
			if (count($row) == 9 && trim($row[8]) == $domain)
			{
				$result[] = $row;
			}
		}
		return $result;
	}
	
	function get_sig($sig_name)
	{
		foreach($this->read($this::FILE_SIG_CUSTOM) as $line)
		{
			$row = explode("\t", $line);
			if (count($row) == 9 && trim($row[3]) == $sig_name)
			{
				return $row;
			}
		}
		return FALSE;
	}
	
	function del_sig($sig_name)
	{
		$text = '';
		foreach($this->read($this::FILE_SIG_CUSTOM) as $line)
		{
			$row = explode("\t", $line);
			if (count($row) == 9 && trim($row[3]) != $sig_name)
			{
				$text .= $line . "\n";
			}
		}
		return $this->write($this::FILE_SIG_CUSTOM, $text);
	}
	
	function toggle_sig($sig_name)
	{
		$text = '';
		foreach($this->read($this::FILE_SIG_CUSTOM) as $line)
		{
			$row = explode("\t", $line);
			if (count($row) == 9 && trim($row[0]) == 'ON' && trim($row[3]) == $sig_name)
			{
				$text .= "OFF\t{$row[1]}\t\t{$row[3]}\t{$row[4]}\t{$row[5]}\t{$row[6]}\t\t{$row[8]}\n";
			}
			elseif (count($row) == 9 && trim($row[0]) == 'OFF' && trim($row[3]) == $sig_name)
			{
				$text .= "ON\t{$row[1]}\t\t{$row[3]}\t{$row[4]}\t{$row[5]}\t{$row[6]}\t\t{$row[8]}\n";
			}
			elseif (count($row) == 9)
			{
				$text .= $line . "\n";
			}
		}
		return $this->write($this::FILE_SIG_CUSTOM, $text);
	}
	
	function get_logs($domain, $log_type)
	{
		switch(intval($log_type))
		{
			case 1:
				$lines = $this->read($this::FILE_DETECT_LOG);
				break;
			case 2:
				$lines = $this->read($this::FILE_FORM_LOG);
				break;
			default:
				return FALSE;
		}
		
		$logs = [];
		foreach($lines as $line)
		{
			if (preg_match("/{$domain}/", $line))
			{
				$logs[] = $line;
			}
		}
		return $logs;
	}
	
}