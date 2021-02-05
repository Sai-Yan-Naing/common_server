<?php

require_once("config/all.php");
require_once('models/account.php');
require_once 'vendor/autoload.php';
$domain_userid = $_POST['domain_userid'];

$account = new Account;
if($account->passReset($domain_userid))
{
	require_once("views/pass_reset_confirm.php");
}else{
	echo "invalid domain or user id.";
}

// require_once("views/login_confirm.php");

?>
