
<?php

/**
 * 
 */
class Backup
{
	
	function addAutoBackup($domain,$name,$scheduler){

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			if($this->checkScheduler($domain)>0)
			{
				$stmt2 = $pdo_account->prepare("UPDATE back_data SET `scheduler` = ? WHERE `domain` = ?");
				$stmt2->execute(array($scheduler,$domain));
			}else{
				$stmt = $pdo_account->prepare("INSERT INTO back_data (`domain`, `name`, `scheduler`) VALUES (?, ?, ?)");
				$stmt->execute(array($domain, $name, $scheduler)) or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
			}
			

			return true;

		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			// require_once("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function checkScheduler($domain)
	{
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt1 = $pdo_account->prepare("SELECT * FROM back_data WHERE `domain` = ?");
			$stmt1->execute(array($domain));
			$data = $stmt1->fetch(PDO::FETCH_ASSOC);
			return $data;
	}

	
	
}

?>