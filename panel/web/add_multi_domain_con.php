<?php
require_once("config/all.php");
require_once('models/account.php');

$domain = $_POST['domain'];
$web_dir = $_POST['web_dir'];
$ftp_user = $_POST['ftp_user'];
$password = $_POST['password'];
$token = $_POST['token'];

$account = new Account;
if($account->addMultiDomain($domain, $web_dir, $ftp_user, $password, $token))
{
	// echo "success";
	header('Location: /home.php');
}else{
	echo "domain already exist.";
}


?>