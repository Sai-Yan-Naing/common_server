<?php

require_once('models/mysql.php');
require_once('models/mariadb.php');
require_once('models/mssql.php');
// require_once("config/all.php");
echo $type = $_POST["type"];
echo $action = $_POST["action"];

$db_username = $_POST["db_username"];
$db_password = $_POST["db_password"];

if($type=="MYSQL"){

	$mysql = new MySQL;
	if($action=="new")
	{
		$db_name = $_POST["db_name"];
		if(!$mysql->addList($db_name, $db_username, $db_password, $domain=$_COOKIE['d'])){
				// require_once("views/mysqlerror.php");
				die("error");
			}

			$mysql->addUserAndDB($db_name, $db_username, $db_password);
	}elseif ($action=="edit") {
		// die('hello');
		$mysql->changePassword($db_username,$db_password);
	}else{
		$id=$_POST['id'];
		$db_name = $_POST['db_name'];
		$mysql->deleteDB($id,$db_username,$db_name);
	}
	header("Location: /database.php");

}elseif ($type=="MSSQL") {
	$mssql = new MsSQL;
	if($action=="new")
	{
		$db_name = $_POST["db_name"];
		if (!$mssql->addList("2016", $db_name, $db_username, $db_password,$_COOKIE['d'])) {
			// require_once("views/mssqlerror.php");
			die("error");
		}
		$mssql->addUserAndDB("2016",$db_name, $db_username, $db_password);
	}elseif ($action=="edit") {
		$mssql->changePassword($db_username,$db_password);
	}else{
		$id=$_POST['id'];
		$db_name = $_POST['db_name'];
		$mssql->deleteDB($id,$db_username,$db_name);
	}
	
	header("Location: /database.php");
}else{
	$mariadb = new MariaDB;
	if($action=="new")
	{
		$db_name = $_POST["db_name"];
		if(!$mariadb->addList($db_name, $db_username, $db_password, $domain=$_COOKIE['d'])){
			// require_once("views/mysqlerror.php");
			die("mariadb error");
		}

		$mariadb->addUserAndDB($db_name, $db_username, $db_password);
	}elseif ($action=="edit") {
		$mariadb->changePassword($db_username,$db_password);
	}else{
		$id=$_POST['id'];
		$db_name = $_POST['db_name'];
		$mariadb->deleteDB($id,$db_username,$db_name);
	}
	
	header("Location: /database.php");
}

	
?>