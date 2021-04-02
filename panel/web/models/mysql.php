<?php
class MySQL{
	function __construct() {
		require_once("config/all.php");
	}

	function addList($db, $db_user, $db_password, $domain){

		if (strcmp($db, "") == 0 || strcmp($db_user, "") == 0  ||  strcmp($db_password, "") == 0) {
			return false;
		}
		if (strpos($db, "mysql") !== FALSE || strpos($db, "performance_schema") !== FALSE || strpos($db, "japan_system_development") !== FALSE) {
			return false;
		}
		if (strpos($db, "CONCAT") !== FALSE || strpos($db_user, "CONCAT") !== FALSE || strpos($db_password, "CONCAT") !== FALSE) {
			return false;
		}
		if (strpos($db_user, "root") !== FALSE) {
			return false;
		}
		if (strlen($db) != mb_strlen($db, 'UTF-8') || strlen($db_user) != mb_strlen($db_user, 'UTF-8') || strlen($db_password) != mb_strlen($db_password, 'UTF-8')){
			return false;
		}

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT COUNT(id) as cnt FROM db_account WHERE `db_name` = :db OR `db_user` = :db_user");
			$stmt->bindParam(":db", $db, PDO::PARAM_STR);
			$stmt->bindParam(":db_user", $db_user, PDO::PARAM_STR);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($data['cnt'] > 0) {
				$pdo_account = NULL;
				require_once("views/mysqlerror.php");
				return false;
			}


		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require_once("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
		$stmt = $pdo_account->prepare("INSERT INTO db_account (`domain`, `db_name`, `db_user`, `db_count`, `pass`) VALUES (:domain, :db, :db_user, 1, :db_password)") or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
		$stmt->bindParam(":domain", $domain, PDO::PARAM_STR);
		$stmt->bindParam(":db", $db, PDO::PARAM_STR);
		$stmt->bindParam(":db_user", $db_user, PDO::PARAM_STR);
		$stmt->bindParam(":db_password", $db_password, PDO::PARAM_STR);
		$stmt->execute();
		$pdo_account = NULL;
		return true;
	}

	function addUserAndDB($db, $db_user, $db_password){
		try {
			$dsn2 = 'mysql:host=localhost';
			$pdo = new PDO($dsn2, ROOT, ROOT_PASS);
			$db = trim($pdo->quote($db), "'\"");
			$stmt = $pdo->prepare("CREATE DATABASE `$db`;");
			$stmt->execute() or die("creating database fails... <br />");
			$stmt = $pdo->prepare("CREATE USER :db_user@'%' IDENTIFIED BY :db_password;");
			$stmt->bindParam(":db_user", $db_user, PDO::PARAM_STR);
			$stmt->bindParam(":db_password", $db_password, PDO::PARAM_STR);
			$stmt->execute() or die("creating user fails... <br />". print_r($pdo->errorInfo(), true));
			$stmt = $pdo->prepare("GRANT ALL ON `$db`.* TO :db_user@'%';");
			$stmt->bindParam(":db_user", $db_user, PDO::PARAM_STR);
			$stmt->execute() or die("grant error <br />" . $pdo->errorCode() . "<br />" . print_r($pdo->errorInfo(), true));
		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
		$pdo = NULL;
		return true;
	}

		function changePassword($dbuser,$dbpass){
			$dsn2 = 'mysql:host=localhost';
			$pdo = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo->prepare("ALTER USER '$dbuser'@'%' IDENTIFIED BY '$dbpass';");
			$stmt->execute() or die("change password failed <br />". print_r($pdo->errorInfo(), true));
			$stmt1 = $pdo->prepare("UPDATE db_account SET `pass` = ? WHERE `db_user` = ?");
			$stmt1->execute(array($dbpass,$dbuser));
			return true;
	}

	function getAll()
	{
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			$stmt = $pdo_account->prepare("SELECT * FROM db_account WHERE `domain` = ?");
			$stmt->execute(array($_COOKIE['d']));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function domain_check($domain){
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT * FROM db_account WHERE `domain` = :domain;");
			$stmt->bindParam(":domain", $domain, PDO::PARAM_STR);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($data['domain'] != "") {
				return $data;
			}

		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$pdo_account = NULL;
			return false;
		}
		$pdo_account = NULL;
		return false;
	}


	function importWP($sql,$db_name,$db_username,$pass){
		try {
			$pdo_account = new PDO('mysql:host=localhost;dbname='.$db_name, $db_username, $pass);
			// echo $pdo_account->exec($sql);
			if($pdo_account->exec($sql)==0){
				return true;
			}else{
				return false;
			}


		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$pdo_account = NULL;
			return false;
		}
		$pdo_account = NULL;
		return false;
	}


}
