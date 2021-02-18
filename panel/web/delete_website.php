<?php

require_once("config/all.php");
require_once('models/account.php');

$domainID = $_GET['domainid'];

$account = new Account;

if($account->deleteDomain($domainID)){
	header('Location: /home.php');
}else{
	echo "Error";
}
?>