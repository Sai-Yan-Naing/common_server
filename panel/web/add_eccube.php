<?php

require_once('header/validation.php');
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
if ($ei->addEcCube($domain, $password, $dir) == true) {
	require_once('views/add_eccube.php');
} else {
	require_once('views/add_eccube_error.php');
}
?>
