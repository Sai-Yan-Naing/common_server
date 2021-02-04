<?php
require_once("header/validation.php");
require_once("config/all.php");
require_once("models/mysql.php");


$db = $_POST["db"];
$db_user = $_POST["db_user"];
$db_password = $_POST["db_password"];
$domain = $_COOKIE["d"];

$mysql = new MySQL;
if($mysql->addList($db, $db_user, $db_password, $domain) === false){
	require_once("views/mysqlerror.php");
	die();
}

$mysql->addUserAndDB($db, $db_user, $db_password);

require_once("views/mysqlconfirm.php");
?>
