<?php
require_once("header/validation.php");
require_once("models/siteguard.php");

$log_type = $_POST['log_type'];
switch (intval($log_type))
{
	case 1:
		$file_name = 'siteguard_' . $domain . '_detect.log';
		break;
	case 2:
		$file_name = 'siteguard_' . $domain . '_form.log';
		break;
	default:
		exit();
}

$dir_path = 'E:/webroot/LocalUser/panel/tmp/';
if ( ! file_exists($dir_path))
{
	mkdir($dir_path, 0755, TRUE);
}

$file_path = $dir_path . $file_name;
$sg = new SiteGuard;
file_put_contents($file_path, implode("\n", $sg->get_logs($domain, $log_type)), LOCK_EX);

header(sprintf("Content-Disposition: attachment; filename=\"%s\"", $file_name));
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.filesize($file_path));
echo file_get_contents($file_path);
exit();