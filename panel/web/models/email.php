<?php
class Email{
	function __construct() {
		require_once("config/all.php");
	}

	function addEmail($domain,$email,$password){
		$email=$email.'@'.$domain;
		// $password = hash_hmac('sha256', $password, PASS_KEY);

	try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("INSERT INTO add_email (`domain`, `email`, `password`) VALUES (:domain, :email, :password)") or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
			$stmt->bindParam(":domain", $domain, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();
			$pdo_account = NULL;
			// die();
			return true;


		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			// require_once("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function getAll()
	{
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			$stmt = $pdo_account->prepare("SELECT * FROM add_email WHERE `domain` = ?");
			$stmt->execute(array($_COOKIE['d']));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			// require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function changePassword($email,$password,$eid){
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("UPDATE add_email SET `password` = ? WHERE `id` = ?");
			$stmt->execute(array($password,$eid));
			return true;
	}

	function deleteEmail($email,$eid)
	{
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			
			$dstmt = $pdo_account->prepare("DELETE FROM `add_email` WHERE id = ?");
			// $ddata = $dstmt->fetchAll(PDO::FETCH_ASSOC);
			$dstmt->execute(array($eid));
			return true;
	}
	function getData($id)
	{
		$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// 
		$stmt1 = $pdo_account->prepare("SELECT * FROM add_email WHERE `id` = ?");
		$stmt1->execute(array($id));
		$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		$pdo_account = NULL;
		return $data1;
	}

}