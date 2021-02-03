<?php
require_once("config/all.php");
require_once('models/account.php');

$domain_userid = $_POST['domain_userid'];
$password = $_POST['password'];

$account = new Account;
$account->login($domain_userid, $password);

require_once("views/login_confirm.php");

?>
