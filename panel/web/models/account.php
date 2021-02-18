<?php
// session_start();
class Account{
	function __construct() {
		require_once("config/all.php");
	}

	// アカウント情報取得
	function getAccount($domain, $password, $datasrc = "*") {
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT $datasrc FROM web_account WHERE `domain` = ? AND `password` = ?");
			$stmt->execute(array($domain,$password));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($data['user'] == "") {
				$pdo_account = NULL;
				$error_message = "不正なユーザー名です。";
				require("views/allerror.php");
				die();
			} else {
				$user = $data['user'];
			}

		} catch (PDOException $e) {
			//print('Error ' . $e->getMessage());
			$pdo_account = NULL;
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			die();
		}
		$pdo_account = NULL;
		return $data;
	}

	// パスワード変更
	function changePass($pass_1, $domain, $password){
		$pass_encrypted = hash_hmac('sha256', $pass_1, PASS_KEY);
		$password = hash_hmac('sha256', $password, PASS_KEY);

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT * FROM web_account WHERE `domain` = ? AND `password` = ?");
			$stmt->execute(array($domain,$password));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($data['user'] == "") {
				$pdo_account = NULL;
				return -1;
			} else {
				$user = $data['user'];
				$id = $data['id'];
				$stmt = $pdo_account->prepare("UPDATE web_account SET `password` = ? WHERE `domain` = ?");
				$stmt->execute(array($pass_encrypted,$domain));
				$stmt = $pdo_account->prepare("REPLACE INTO `current_pass` (`web_id`, `password`) VALUES (?, ?)");
				$stmt->execute(array($id,$pass_1));
				$pdo_account = NULL;
			}


		} catch (PDOException $e) {
			$pdo_account = NULL;
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			die();
		}
		return $pass_encrypted;
	}

	// ログイン処理
	function login($domain_userid, $password) {
		/* ハッシュ化 */
		$pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$dstmt = $pdo_account->prepare("SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = ? AND `password` = ? AND stopped = 0");
			$dstmt->execute(array($domain_userid,$pass_encrypted));
			$ddata = $dstmt->fetch(PDO::FETCH_ASSOC);

			//for customer
			$stmt = $pdo_account->prepare("SELECT COUNT(user_id) as cnt FROM customer WHERE `user_id` = ? AND `password` = ?");
				$stmt->execute(array($domain_userid,$pass_encrypted));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($ddata['cnt'] > 0) {
				setcookie("d", $domain_userid, time() + 3600);
				setcookie("p", $pass_encrypted, time() + 3600);
				header('Location: /dhome.php');
			}else if($data['cnt'] > 0){
				setcookie("d", $domain_userid, time() + 3600);
				setcookie("p", $pass_encrypted, time() + 3600);
				header('Location: /home.php');
			}else{
				$_SESSION["login_attempts"] += 1;
				header('Location: /login_error.php');
			}


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function passReset($domain_userid){
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT * FROM web_account WHERE `domain` = ? AND stopped = 0");
			$stmt->execute(array($domain_userid));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($data > 0) {
				// sendEmail()
				$stmt1 = $pdo_account->prepare("SELECT * FROM customer WHERE `user_id` = ?");
				$stmt1->execute(array($data['customer_id']));
				$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
				$this->sendEmail($data['token'], $data1['email']);
					$stmt2 = $pdo_account->prepare("UPDATE web_account SET `status` = 0 WHERE `domain` = ?");
					$stmt2->execute(array($domain_userid));
				setcookie("domain_userid", $domain_userid, time() + 3600);
				// setcookie("token", $data1['token'], time() + 3600);
				return true;
				// header('Location: /home.php');
			}else{
				$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
				$stmt = $pdo_account->prepare("SELECT * FROM customer WHERE `user_id` = ?");
				$stmt->execute(array($domain_userid));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				if ($data > 0) {
					$this->sendEmail($data['token'], $data['email']);
					$stmt1 = $pdo_account->prepare("UPDATE customer SET `status` = 0 WHERE `user_id` = ?");
					$stmt1->execute(array($domain_userid));
					// $stmt = $pdo_account->prepare("REPLACE INTO `current_pass` (`web_id`, `password`) VALUES (?, ?)");
					// $stmt->execute(array($id,$pass_1));
					$pdo_account = NULL;
					setcookie("domain_userid", $domain_userid, time() + 3600);
					setcookie("token", $data['token'], time() + 3600);
					// header('Location: /home.php');
				return true;
				}
			}
			return false;


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function getDatabyToken($token, $domain_userid){

		try {
				$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
				// for domain
				$dstmt = $pdo_account->prepare("SELECT * FROM web_account WHERE `token` = ? AND domain=? AND status=0");
				$dstmt->execute(array($token,$domain_userid));
				$ddata = $dstmt->fetch(PDO::FETCH_ASSOC);

				// for customer
				$stmt = $pdo_account->prepare("SELECT * FROM customer WHERE `token` = ? AND `user_id` = ?  AND `status` = 0");
				$stmt->execute(array($token,$domain_userid));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				// echo $token.$domain_userid;
				// die();
				if ($ddata > 0) {
					setcookie("domain_userid", $domain_userid, time() + 3600);
					return true;
				}else if ($data > 0) {
					setcookie("domain_userid", $domain_userid, time() + 3600);
					return true;
				}else{
					return false;
				}

			} catch (PDOException $e) {
				print('Error ' . $e->getMessage());
				$error_message = "データベースへの接続エラーです。";
				require("views/allerror.php");
				$pdo_account = NULL;
				die();
			}
	}

	function updatePassword($password, $domain_userid){
		$pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			$stmt = $pdo_account->prepare("SELECT * FROM web_account WHERE `domain` = ? AND stopped = 0");
			$stmt->execute(array($domain_userid));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($data > 0) {
					$stmt1 = $pdo_account->prepare("UPDATE web_account SET `password` = ?, `status` = 1 WHERE `domain` = ?");
					$stmt1->execute(array($pass_encrypted,$domain_userid));
					// $stmt = $pdo_account->prepare("REPLACE INTO `current_pass` (`web_id`, `password`) VALUES (?, ?)");
					// $stmt->execute(array($id,$pass_1));
					$pdo_account = NULL;
				// 	echo "error";
				// 	die();
				return true;
			}else{
				$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
				$stmt = $pdo_account->prepare("SELECT * FROM customer WHERE `user_id` = ?");
				$stmt->execute(array($domain_userid));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				if ($data > 0) {
					$stmt = $pdo_account->prepare("UPDATE customer SET `password` = ? WHERE `user_id` = ?");
					$stmt->execute(array($pass_encrypted,$domain_userid));
					// $stmt = $pdo_account->prepare("REPLACE INTO `current_pass` (`web_id`, `password`) VALUES (?, ?)");
					// $stmt->execute(array($id,$pass_1));
					$pdo_account = NULL;
					// header('Location: /home.php');
				return true;
				}
			}


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function addMultiDomain($domain, $web_dir, $ftp_user, $password, $token){
		$pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			// for domain
			$stmt = $pdo_account->prepare("SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = ?");
			$stmt->execute(array($domain));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($data['cnt'] <= 0) {
				$stmt_create = $pdo_account->prepare("INSERT INTO web_account (`domain`, `password`, `user`, `word_dir`, `customer_id`, `token`) VALUES (:domain, :password, :user, :word_dir, :customer_id, :token)") or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
				$stmt_create->bindParam(":domain", $domain, PDO::PARAM_STR);
				$stmt_create->bindParam(":password", $pass_encrypted, PDO::PARAM_STR);
				$stmt_create->bindParam(":user", $domain, PDO::PARAM_STR);
				$stmt_create->bindParam(":word_dir", $web_dir, PDO::PARAM_STR);
				$stmt_create->bindParam(":customer_id", $_COOKIE["d"], PDO::PARAM_STR);
				// $stmt_create->bindParam(":status", 1, PDO::PARAM_INT);
				$stmt_create->bindParam(":token", $token, PDO::PARAM_STR);
				$stmt_create->execute();
				$pdo_account = NULL;

				$root_dir = 'c:/laragon/www/'.$web_dir.'/';
			   if (!file_exists ($root_dir))
			      {
			          mkdir($root_dir,0777,true);  
				  }
				// die();
				return true;
				// header('Location: /home.php');

			}else{
				return false;
			}


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function getMultiDomain($customer_id){
		// $pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// for customer
			// $stmt = $pdo_account->prepare("SELECT * FROM customer WHERE `token` = ? AND `user_id` = ?  AND `status` = 0");
			// $stmt->execute(array($token,$domain_userid));
			// $data = $stmt->fetch(PDO::FETCH_ASSOC);

			$dstmt = $pdo_account->prepare("SELECT * FROM web_account WHERE `customer_id` = ?");
			$dstmt->execute(array($customer_id));
			$ddata = $dstmt->fetchAll(PDO::FETCH_ASSOC);
			return $ddata;


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function deleteDomain(int $domainid)
	{
		// echo gettype($domainid);
		// die();
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			$stmt = $pdo_account->prepare("SELECT * FROM `web_account` WHERE `id` = ?");
			$stmt->execute(array($domainid));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			$dstmt = $pdo_account->prepare("DELETE FROM `web_account` WHERE id = ?");
			// $ddata = $dstmt->fetchAll(PDO::FETCH_ASSOC);
			if($dstmt->execute(array($domainid)))
			{
				$root_dir = 'c:/laragon/www/'.$data['word_dir'].'/';
				if(!rmdir($root_dir)) {
				  echo ("Could not remove $root_dir");
				  die();
				}
				return true;
			}
			return false;


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function sendEmail($token,$tomail){
	
    $transport = (new Swift_SmtpTransport('smtp.googlemail.com', 465, 'ssl'))
      ->setUsername('capital.saiyannaing@gmail.com')
      ->setPassword('saiyannaing123!')
    ;
 
    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
		$body = 'Hello, <p><a href="http://assistup.test/new_pass.php?token='.$token.'">password reset link</a></p>';

		$message = (new Swift_Message('Please change your new password.'))
		      ->setFrom(['capital.saiyannaing@gmail.com' => 'Password Reset Link'])
		      ->setTo($tomail)
		      // ->setCc(['RECEPIENT_2_EMAIL_ADDRESS'])
		      // ->setBcc(['RECEPIENT_3_EMAIL_ADDRESS'])
		      ->setBody($body)
		      ->setContentType('text/html')
		    ;
		 
		    // Send the message
		    $mailer->send($message);
	}

}
