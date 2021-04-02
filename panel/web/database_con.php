<?php

require_once('models/mysql.php');
require_once('models/mssql.php');
// require_once("config/all.php");
$type = $_POST["type"];
$db_name = $_POST["db_name"];
$db_username = $_POST["db_username"];
$db_password = $_POST["db_password"];

if($type=="mysql"){

	$mysql = new MySQL;

	if(!$mysql->addList($db_name, $db_username, $db_password, $domain=$_COOKIE['d'])){
		require_once("views/mysqlerror.php");
		die();
	}

	$mysql->addUserAndDB($db_name, $db_username, $db_password);
	header("Location: /database.php");

}elseif ($type=="mssql") {
	$mssql = new MsSQL;

	if (!$mssql->addList("2016", $db_name, $db_username, $db_password, $domain=$_COOKIE['d'])) {
		require_once("views/mssqlerror.php");
		die();
	}
	$mssql->addUserAndDB("2016",$db_name, $db_username, $db_password);
	header("Location: /database.php");
}else{
	echo "mariadb";
}

	
?>