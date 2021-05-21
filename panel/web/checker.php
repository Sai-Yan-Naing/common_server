<?php
if (!isset($_COOKIE['d'])) {
	die("cookies_error");
}
	require_once("config/all.php");
	require_once ("models/common.php");
	$common = new Common;
	echo $alreadyExist = $common->alreadyExist($_POST['table'],$_POST['column'],$_POST['checker']);
?>