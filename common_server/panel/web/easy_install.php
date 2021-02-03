<?php
	require_once("header/validation.php");
	require_once("models/account.php");
	$account = new Account();
	$data = $account->getAccount($domain, $password);

	require_once("views/easy_install.php");
/*
	if ($data['plan'] == STARTER_PLAN) {
		require("views/easy_starter.php");
	} else {
		require("views/easy_install.php");
	}
*/
?>