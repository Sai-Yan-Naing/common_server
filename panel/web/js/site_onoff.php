<?php
require_once("config/all.php");
require_once('models/account.php');
$site_onoff=$_GET["site_onoff"];
$onoff=$_GET["onoff"];
$app=$_GET['app'];
$account = new Account;
if(isset($site_onoff))
{
	if($onoff=="on")
	{
		if($app=="site"){
			echo Shell_Exec ("%windir%\system32\inetsrv\appcmd.exe start sites $site_onoff");
			// echo $stopsite=$account->Site('site',1,$site_onoff);
			$stopsite=$account->Site('site',1,$site_onoff);
		}else{
			echo Shell_Exec ('%windir%\system32\inetsrv\appcmd.exe start apppool /apppool.name:'.$site_onoff);
			// echo $stopsite=$account->Site('app',1,$site_onoff);
			$stopsite=$account->Site('app',1,$site_onoff);
		}
		
	}else{
		if($app=="site"){
			echo Shell_Exec ("%windir%\system32\inetsrv\appcmd.exe stop sites $site_onoff");
			// echo $stopsite=$account->Site('site',0,$site_onoff);
			$stopsite=$account->Site('site',0,$site_onoff);
		}else{
			echo Shell_Exec ('%windir%\system32\inetsrv\appcmd.exe stop apppool /apppool.name:'.$site_onoff);
			// echo $stopsite=$account->Site('app',0,$site_onoff);
			$stopsite=$account->Site('app',0,$site_onoff);
		}
	}
	// echo $onoff;
}

if(isset($_GET['new_error']))
{
	$new_error= $_GET['new_error'];
	$status_code= $_GET['status_code'];
	$url_spec= $_GET['url_spec'];
	echo Shell_Exec ("c:/laragon/www/app/error.cmd ". $_COOKIE['d']." ". $status_code." ".$url_spec);

	echo $account->errorPages($_COOKIE['d'], $new_error,$status_code,$url_spec);

}
?>