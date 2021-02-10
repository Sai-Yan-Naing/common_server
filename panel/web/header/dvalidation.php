<?php

require("config/all.php");

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

#echo $password . "<br>";
#echo $domain;

try {
	$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

	// for customer id
	// $stmt = $pdo_account->prepare("SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = ? and `password` = ?");
	$stmt = $pdo_account->prepare("SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = ? and `password` = ?");
	$stmt->execute(array($domain,$password));
	$data = $stmt->fetch(PDO::FETCH_ASSOC);

	if(isset($domain) && isset($password))
	{
		if ($data['cnt'] == 0) {
			echo "No permission.".'<p><a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a></p>';
			die();
		}

	}else{
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

