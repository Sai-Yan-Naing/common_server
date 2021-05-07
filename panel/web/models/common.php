<?php

class Common{
	// function __construct() {
	// 	require_once("config/all.php");
	// }
		function getWebaccount($domain){
				$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
				// 
				$stmt1 = $pdo_account->prepare("SELECT user FROM web_account WHERE `domain` = ?");
				$stmt1->execute(array($domain));
				$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
				return $data1;
		}

	}

?>