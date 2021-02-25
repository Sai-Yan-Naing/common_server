<?php

require_once('models/mysql.php');

$app = $_POST["app"];
// $dir = $_POST["dir"];
$db_name = $_POST["db_name"];
$db_username = $_POST["db_username"];
$db_password = $_POST["db_password"];
if($app=="wordpress"){
	$mysql = new MySQL;
	$mysql->addUserAndDB($db_name, $db_username, $db_password);
	echo "success";
}

?>