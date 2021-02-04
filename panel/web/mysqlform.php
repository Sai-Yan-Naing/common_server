<?php
require_once("header/validation.php");
require_once("config/all.php");
require_once("models/mysql.php");

$domain = $_COOKIE['d'];
$mysql = new MySQL;
if(($data = $mysql->domain_check($domain)) !== false) {
	require_once("views/mysql_info.php");
} else {
	require_once("views/mysqlform.php");
}

?>
