<?php
require("config/all.php");

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

#echo $password . "<br>";
#echo $domain;

try {
	$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
	$stmt = $pdo_account->prepare("SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = ? and `password` = ?");
	// $stmt = $pdo_account->prepare("SELECT COUNT(user_id) as cnt FROM customer WHERE `user_id` = ? and `password` = ?");
	$stmt->execute(array($domain,$password));
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($data['cnt'] == 0) {
		header('Location: /login.php');	
	}

} catch (PDOException $e) {
	print('Error ' . $e->getMessage());
	$pdo = NULL;
	die();
}

setcookie("d", $domain, time() + 3600);
setcookie("p", $password, time() + 3600);
$pdo_account = NULL;
$stmt = NULL;
$data = NULL;
?>

