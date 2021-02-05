<?php

$domain_userid = $_COOKIE["domain_userid"];
$newpass = $_POST["newpass"];

require_once("config/all.php");
require_once('models/account.php');

$account = new Account;

if($account->updatePassword($newpass,$domain_userid)){
	require_once('views/new_pass_confirm.php');
}else{
	echo "password is invalid";
}
?>


