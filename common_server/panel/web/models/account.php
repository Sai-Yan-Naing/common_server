<?php
class Account{
	function __construct() {
		require_once("config/all.php");
	}

	// アカウント情報取得
	function getAccount($domain, $password, $datasrc = "*") {
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT $datasrc FROM web_account WHERE `domain` = ? AND `password` = ?");
			$stmt->execute(array($domain,$password));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($data['user'] == "") {
				$pdo_account = NULL;
				$error_message = "不正なユーザー名です。";
				require("views/allerror.php");
				die();
			} else {
				$user = $data['user'];
			}

		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$pdo_account = NULL;
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			die();
		}
		$pdo_account = NULL;
		return $data;
	}

	// パスワード変更
	function changePass($pass_1, $domain, $password){
		$pass_encrypted = hash_hmac('sha256', $pass_1, PASS_KEY);
		$password = hash_hmac('sha256', $password, PASS_KEY);

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT * FROM web_account WHERE `domain` = ? AND `password` = ?");
			$stmt->execute(array($domain,$password));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($data['user'] == "") {
				$pdo_account = NULL;
				return -1;
			} else {
				$user = $data['user'];
				$id = $data['id'];
				$stmt = $pdo_account->prepare("UPDATE web_account SET `password` = ? WHERE `domain` = ?");
				$stmt->execute(array($pass_encrypted,$domain));
				$stmt = $pdo_account->prepare("REPLACE INTO `current_pass` (`web_id`, `password`) VALUES (?, ?)");
				$stmt->execute(array($id,$pass_1));
				$pdo_account = NULL;
			}


		} catch (PDOException $e) {
			$pdo_account = NULL;
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			die();
		}
		return $pass_encrypted;
	}

	// ログイン処理
	function login($domain, $password) {
		/* ハッシュ化 */
		$pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = ? AND `password` = ? AND stopped = 0");
			$stmt->execute(array($domain,$pass_encrypted));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($data['cnt'] > 0) {
				setcookie("d", $domain, time() + 3600);
				setcookie("p", $pass_encrypted, time() + 3600);
				header('Location: /top.php');
			}


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

}
