<?php
class EasyInstall{
	function __construct() {
		require_once("config/all.php");
	}

	// EC-CUBEの自動インストール
	function addEcCube($domain, $password, $dir) {
		if (strlen($dir) != mb_strlen($dir, 'UTF-8')){
			return false;
		}
		if (strpos($dir, "&") !== FALSE || strpos($dir, "..") !== FALSE || strpos($dir, '/') !== FALSE || strpos($dir, "\\") !== FALSE) {
			return false;
		}
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("UPDATE web_account SET eccube_require = 1, ec_dir = ? WHERE `domain` = ? AND `password` = ?");
			$stmt->execute(array($dir,$domain,$password));
		} catch (PDOException $e) {
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
		return true;
	}

	// WordPressの自動インストール
	function addWordPress($domain, $password, $dir) {
		if (strlen($dir) != mb_strlen($dir, 'UTF-8')){
			return false;
		}
		if (strpos($dir, "&") !== FALSE || strpos($dir, "..") !== FALSE || strpos($dir, '/') !== FALSE || strpos($dir, "\\") !== FALSE) {
			return false;
		}
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("UPDATE web_account SET wordpress_require = 1, word_dir = ? WHERE `domain` = ? AND `password` = ?");
			$stmt->execute(array($dir,$domain,$password));
		} catch (PDOException $e) {
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
		return true;
	}
}

?>