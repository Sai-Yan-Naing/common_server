<?php
require_once("header/validation.php");
require_once("config/all.php");
require_once("models/mssql.php");

$domain = $_COOKIE['d'];
$mysql = new MySQL;
if(($data = $mysql->checkDomain($domain)) !== false) {
	require_once("views/mssql_info.php");
} else {
	require_once("views/mssqlform.php");
}

?>
