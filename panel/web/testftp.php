<?php
require_once('models/mysql.php');
$mysql = new MySQL;
echo $dbaccount=$mysql->changePassword("ckm_test12","welcome1234");
?>