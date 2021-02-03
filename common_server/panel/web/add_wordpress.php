<?php

require_once("header/validation.php");
require_once('config/all.php');
require_once('models/easyinstall.php');
require_once('models/mysql.php');

$dir = $_POST["dir"];
$mysql = new MySQL;

if ($mysql->domain_check($domain) == false) {
	require_once('views/add_db_req.php');
	die();
}

$ei = new EasyInstall;
if ($ei->addWordPress($domain, $password, $dir) == true) {
	require_once('views/add_wordpress.php');
} else {
	require_once('views/add_wordpress_error.php');
}
?>
