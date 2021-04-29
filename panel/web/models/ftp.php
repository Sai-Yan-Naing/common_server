<?php
class Ftp{
	function __construct() {
		require_once("config/all.php");
	}

	function addFtp($domain,$ftpuser,$ftp_pass_word,$permission){
		// $email=$email.'@'.$domain;
		// $password = hash_hmac('sha256', $password, PASS_KEY);

	try {
		$per = "";
		if (in_array("F", $permission))
		{
			$per = "F";
		}else if(in_array("W", $permission))
		{
			$per = "W";
		}else{
			$per = "R";
		}

		$permission = implode(",",$permission);
		// return $domain.$ftpuser.$ftp_pass_word.$permission;
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// 
			$stmt1 = $pdo_account->prepare("SELECT user FROM web_account WHERE `domain` = ?");
			$stmt1->execute(array($domain));
			$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
			$ftp_folder=$data1['user'];
			// for domain
			$stmt = $pdo_account->prepare("SELECT COUNT(username) as cnt FROM db_ftp WHERE `username` = ? and `password` = ?");
			$stmt->execute(array($domain, $ftp_pass_word));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			// return $data['cnt'];
				if ($data['cnt'] <= 0) {
					$stmt_create = $pdo_account->prepare("INSERT INTO db_ftp (`username`, `password`, `domain`, `permission`) VALUES (:username, :password, :domain, :permission)") or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
					$stmt_create->bindParam(":username", $ftpuser, PDO::PARAM_STR);
					$stmt_create->bindParam(":password", $ftp_pass_word, PDO::PARAM_STR);
					$stmt_create->bindParam(":domain", $domain, PDO::PARAM_STR);
					$stmt_create->bindParam(":permission", $permission, PDO::PARAM_STR);
					// $stmt_create->bindParam(":status", 1, PDO::PARAM_INT);
					// $stmt_create->bindParam(":token", $token, PDO::PARAM_STR);
					// echo $domain.$ftpuser.$ftp_pass_word.$ftp_folder.$permission;
					// echo Shell_Exec ("E:\scripts\add_ftp.bat ". $ftpuser." ".$ftp_pass_word." ".$ftp_folder." ".$per." new");
					// die();
					if($stmt_create->execute()){
					 Shell_Exec ("E:\scripts\add_ftp.bat ". $ftpuser." ".$ftp_pass_word." ".$ftp_folder." ".$per." new");	
					}else{
						die("error");
					}
					
					$pdo_account = NULL;
					return true;

				}else{
					return false;
				}

			} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			// require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function getWebaccount($domain){
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// 
			$stmt1 = $pdo_account->prepare("SELECT user FROM web_account WHERE `domain` = ?");
			$stmt1->execute(array($domain));
			$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
			return $data1;
	}

	function getAll()
	{
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			$stmt = $pdo_account->prepare("SELECT * FROM db_ftp WHERE `domain` = ?");
			$stmt->execute(array($_COOKIE['d']));
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			// require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}
	function getFtp($id)
	{
		$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// 
		$stmt1 = $pdo_account->prepare("SELECT * FROM db_ftp WHERE `id` = ?");
		$stmt1->execute(array($id));
		$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		$pdo_account = NULL;
		return $data1;
	}

	function changePassword($ftpuser,$ftp_pass_word,$id,$permission){
			$per = "";
			if (in_array("F", $permission))
			{
				$per = "F";
			}else if(in_array("W", $permission))
			{
				$per = "W";
			}else{
				$per = "R";
			}

			$webacc = $this->getWebaccount($_COOKIE['d']);
			$ftp_folder= $webacc['user'];
			$permission = implode(",",$permission);
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("UPDATE db_ftp SET `password` = ?, `permission`=? WHERE `id` = ?");
			if($stmt->execute(array($ftp_pass_word,$permission,$id))){
				// die($ftpuser.$ftp_pass_word.$ftp_folder.$per);
				Shell_Exec ("E:\scripts\add_ftp.bat ". $ftpuser." ".$ftp_pass_word." ".$ftp_folder." ".$per." edit");	
			}else{
				die("error");
			}
			return true;
	}

	function deleteFtp($ftpuser,$id)
	{
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			$webacc = $this->getWebaccount($_COOKIE['d']);
			$ftp_folder= $webacc['user'];

			$dstmt = $pdo_account->prepare("DELETE FROM `db_ftp` WHERE id = ?");
			// $ddata = $dstmt->fetchAll(PDO::FETCH_ASSOC);
			$dstmt->execute(array($id));
			echo Shell_Exec ("E:\scripts\add_ftp.bat ". $ftpuser." "."noneed"." ".$ftp_folder." "."noneed"." delete");
			// die();
			return true;
	}

}