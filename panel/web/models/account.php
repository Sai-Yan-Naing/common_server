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
			$dstmt = $pdo_account->prepare("SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = ? AND `password` = ?");
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

		// $this->addFtp($ftp_user, $password, $_COOKIE["d"], $domain, $web_dir);
		// die();
		$pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);
		$site_init=1;

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			// for domain
			$stmt = $pdo_account->prepare("SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = ?");
			$stmt->execute(array($domain));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($data['cnt'] <= 0) {
				$stmt_create = $pdo_account->prepare("INSERT INTO web_account (`domain`, `password`, `user`, `stopped`, `appstopped`, `web_dir`, `customer_id`, `token`) VALUES (:domain, :password, :user, :stopped, :appstopped, :web_dir, :customer_id, :token)") or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
				$stmt_create->bindParam(":domain", $domain, PDO::PARAM_STR);
				$stmt_create->bindParam(":password", $pass_encrypted, PDO::PARAM_STR);
				$stmt_create->bindParam(":user", $domain, PDO::PARAM_STR);
				$stmt_create->bindParam(":stopped", $site_init, PDO::PARAM_INT);
				$stmt_create->bindParam(":appstopped", $site_init, PDO::PARAM_INT);
				$stmt_create->bindParam(":web_dir", $web_dir, PDO::PARAM_STR);
				$stmt_create->bindParam(":customer_id", $_COOKIE["d"], PDO::PARAM_STR);
				$stmt_create->bindParam(":token", $token, PDO::PARAM_STR);
				$stmt_create->execute();
				$pdo_account = NULL;

				$root_dir = 'c:/laragon/www/'.$web_dir.'/';
				$physicalpath='c:/laragon/www/';
				$physicalpath=str_replace('/', '\rev_del', "c:/laragon/www/");
				$physicalpath=str_replace('rev_del', '', "$physicalpath");
				$physicalpath=$physicalpath.$web_dir;
			   if (!file_exists ($root_dir))
			      {
			      	  // $last_id = $stmt_create->lastInsertId();
			      	  mkdir($root_dir,0777,true);  
			      	  $this->addFtp($ftp_user, $password, $_COOKIE["d"], $domain, $web_dir);
					  $this->addDefaultFile($domain,$password,$web_dir);
			          
				  }

				 Shell_Exec ("%windir%\system32\inetsrv\appcmd.exe add site /name:$domain /bindings:http://$domain:80 /physicalpath:$physicalpath");
				 Shell_Exec ("%windir%\system32\inetsrv\appcmd.exe add apppool /name:$domain");
				 Shell_Exec ("%windir%\system32\inetsrv\appcmd.exe set config /section:applicationPools /[name=$domain].processModel.identityType:ApplicationPoolIdentity");
				 Shell_Exec ("%windir%\system32\inetsrv\appcmd.exe set site /site.name:$domain /[path='/'].applicationPool:$domain");

				 // add to host file
				 $fp = fopen('C:\Windows\System32\drivers\etc\hosts','a');
				fwrite($fp, "127.0.0.1      $domain" . "\n");  
				fclose($fp);

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
			$temp=$data['web_dir'];
			$ftp_temp=$data['domain'];

			$dstmt = $pdo_account->prepare("DELETE FROM `web_account` WHERE id = ?");
			// $ddata = $dstmt->fetchAll(PDO::FETCH_ASSOC);
			if($dstmt->execute(array($domainid)))
			{
				$root_dir = 'c:/laragon/www/'.$temp;
				echo $root_dir;
				// die();
				if(file_exists($root_dir)){
					// die("error");
					if(!$this->rrmdir($root_dir)) {
					  echo ("Could not remove $root_dir");
					  die();
					}
				}

				if ($ftp_temp) {
					$ftpstmt = $pdo_account->prepare("SELECT * FROM `db_ftp` WHERE `domain` = ?");
					if($ftpstmt->execute(array($ftp_temp))){
						$ftpdata = $ftpstmt->fetch(PDO::FETCH_ASSOC);
						echo $ftpdata['domain'];
						$dftp_stmt = $pdo_account->prepare("DELETE FROM `db_ftp` WHERE domain = ?");
						// $ddata = $dstmt->fetchAll(PDO::FETCH_ASSOC);
						$dftp_stmt->execute(array($ftp_temp));
						// if($dftp_stmt->execute(array($ftp_temp)))
						// {
						// 	die();
						// }
						

					}
					
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

	function addFtp($ftp_user, $password, $customer_id, $domain, $web_dir)
	{
		$pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			// for domain
			$stmt = $pdo_account->prepare("SELECT COUNT(username) as cnt FROM db_ftp WHERE `username` = ? and `password` = ? and `web_dir` = ?");
			$stmt->execute(array($domain, $password, $web_dir));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if ($data['cnt'] <= 0) {
					$stmt_create = $pdo_account->prepare("INSERT INTO db_ftp (`username`, `password`, `customer_id`, `domain`, `web_dir`) VALUES (:username, :password, :customer_id, :domain, :web_dir)") or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
					$stmt_create->bindParam(":username", $domain, PDO::PARAM_STR);
					$stmt_create->bindParam(":password", $pass_encrypted, PDO::PARAM_STR);
					$stmt_create->bindParam(":customer_id", $customer_id, PDO::PARAM_STR);
					$stmt_create->bindParam(":domain", $domain, PDO::PARAM_STR);
					$stmt_create->bindParam(":web_dir", $web_dir, PDO::PARAM_STR);
					// $stmt_create->bindParam(":status", 1, PDO::PARAM_INT);
					// $stmt_create->bindParam(":token", $token, PDO::PARAM_STR);
					$stmt_create->execute();
					$pdo_account = NULL;

					// $root_dir = 'c:/laragon/www/'.$web_dir.'/';
				 //   if (!file_exists ($root_dir))
				 //      {
				 //          mkdir($root_dir,0777,true);  
					//   }
					// die();
					// $this->ftpAccount($ftp_user, $password, $web_dir);
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

	function ftpAccount($ftp_user, $bpassword, $web_dir)
	{
		//user info
		$username = $ftp_user;
		$password = md5($bpassword);
		$userDir = "c:/laragon/www/".$web_dir;

		//location of filezilla
		$fileloc = "C:/FileZilla Server/";
		$filelocfile = ($fileloc."FileZilla Server.xml");
		//echo $filelocfile;

		////////////////
		// start add filezilla user
		////////////////

		//Check to see if user name is already used
		$fp = fopen($filelocfile,"r");
		$data = fread($fp,filesize($filelocfile));
		$pos1 = strpos($data,'<User Name="' . $username . '"');//find user name
		//echo (".".$pos1.".");
		fclose($fp);

		//if user not found .. add
		if($pos1 == ""){
		echo "adding user......";

		// user setting for FileZilla FTP

		$fileread = 1;   //Files Read  1 = YES  0 = NO
		$filewrite = 1;  //Files Write
		$filedelete = 1; //Files Delete
		$fileappend = 1; //Files Append, must have Write on
		$dircreate = 1;  //Directory Create
		$dirdelete = 1;  //Directory Delete
		$dirlist = 1;    //Directory List
		$dirsubdirs = 1; //Directory + Subdirs
		 
		// Aktuelle Config wird eingelesen
		$lines = file($filelocfile);


		// Copy Config for backup
		rename($filelocfile, $fileloc . date("Y-m-d;H-i-s")." FileZilla Server.xml" );
		 

		// open Config for writing 
		$file = fopen($filelocfile,"a");

		for($i=0; $i < sizeof($lines); $i++)
		{
		fwrite ($file, $lines[$i]);
		 
		// write new information on top of list after "<Users>" 
		if (strstr($lines[$i],"<Users>"))
		{

		fwrite($file, '<User Name="' . $username . '">
		<Option Name="Pass">' . $password . '</Option>
		<Option Name="Group"/>
		<Option Name="Bypass server userlimit">0</Option>
		<Option Name="User Limit">0</Option>
		<Option Name="IP Limit">0</Option>
		<Option Name="Enabled">1</Option>
		<Option Name="Comments"/>
		<Option Name="ForceSsl">0</Option>
		<IpFilter>
		<Disallowed/>
		<Allowed/>
		</IpFilter>
		<Permissions>
		<Permission Dir="'.$userDir.'">
		<Option Name="FileRead">' . $fileread . '</Option>
		<Option Name="FileWrite">' . $filewrite . '</Option>
		<Option Name="FileDelete">' . $filedelete . '</Option>
		<Option Name="FileAppend">' . $fileappend . '</Option>
		<Option Name="DirCreate">' . $dircreate . '</Option>
		<Option Name="DirDelete">' . $dirdelete . '</Option>
		<Option Name="DirList">' . $dirlist . '</Option>
		<Option Name="DirSubdirs">' . $dirsubdirs . '</Option>
		<Option Name="IsHome">1</Option>
		<Option Name="AutoCreate">0</Option>
		</Permission>
		</Permissions>
		<SpeedLimits DlType="0" DlLimit="10" ServerDlLimitBypass="0" UlType="0" UlLimit="10" ServerUlLimitBypass="0">
		<Download/>
		<Upload/>
		</SpeedLimits>
		</User>
		');
		}
		}

		// Close xml file
		fclose($file);

		//added user now reload FileZilla Server XML file to add user
		// passthru($fileloc.'filezillaserver.exe /reload-config');
		system('"' . $fileloc.'FileZilla server.exe' . '"' . '/reload-config');
		Echo (" filezilla reloaded, user active");
		}else{
		echo "user name ".$username." already used";//did not add user, user name already used
		die();
		}

		// $this->addDefaultFile($username,$bpassword,$web_dir);
		// echo copy("c:/laragon/www/test/index.php","c:/laragon/www/".$web_dir);

		////////////////
		// end add filezilla user
		////////////////
	}

	function addDefaultFile($username,$password,$web_dir)
	{
		$default_file = fopen("c:/laragon/www/".$web_dir."/index.html", "w") or die("Unable to open file!");
		$txt = "Welcome<br>".$username."<br>";
		fwrite($default_file, $txt);
		$txt = "Password<br>".$password;
		fwrite($default_file, $txt);
		fclose($default_file);
	}

	function rrmdir($dir) {
	  if (is_dir($dir)) {
	    $objects = scandir($dir);
	    foreach ($objects as $object) {
	      if ($object != "." && $object != "..") {
	        if (filetype($dir."/".$object) == "dir") 
	           $this->rrmdir($dir."/".$object); 
	        else unlink   ($dir."/".$object);
	      }
	    }
	    reset($objects);
	    rmdir($dir);
	    return true;
	  }

	 }

	 function Site($app, $status, $domain){
		// $pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// for customer
			// $stmt = $pdo_account->prepare("SELECT * FROM customer WHERE `token` = ? AND `user_id` = ?  AND `status` = 0");
			// $stmt->execute(array($token,$domain_userid));
			// $data = $stmt->fetch(PDO::FETCH_ASSOC);

			$dstmt = $pdo_account->prepare("SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = ?");
			$dstmt->execute(array($domain));
			$ddata = $dstmt->fetch(PDO::FETCH_ASSOC);
			if($ddata['cnt'] ==1)
			{
				if($app=="site")
				{
					$stmt = $pdo_account->prepare("UPDATE web_account SET `stopped` = ? WHERE `domain` = ?");
					$stmt->execute(array($status,$domain));
				}else{
					$stmt = $pdo_account->prepare("UPDATE web_account SET `appstopped` = ? WHERE `domain` = ?");
					$stmt->execute(array($status,$domain));
				}
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

	// error pages
	function getErrorPages($domain)
	{
		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);
			// for customer
			// $stmt = $pdo_account->prepare("SELECT * FROM customer WHERE `token` = ? AND `user_id` = ?  AND `status` = 0");
			// $stmt->execute(array($token,$domain_userid));
			// $data = $stmt->fetch(PDO::FETCH_ASSOC);

			$epstmt = $pdo_account->prepare("SELECT * FROM error_pages WHERE `domain` = ?");
			$epstmt->execute(array($domain));
			$epdata = $epstmt->fetchAll(PDO::FETCH_ASSOC);
			return $epdata;


		} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
	}

	function errorPages($domain, $new_error,$statuscode,$url_spec)
	{
		// $pass_encrypted = hash_hmac('sha256', $password, PASS_KEY);

		try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			// for domain
			$stmt = $pdo_account->prepare("SELECT COUNT(statuscode) as cnt FROM error_pages WHERE `domain` = ? and `statuscode` = ?");
			$stmt->execute(array($domain, $statuscode));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if ($data['cnt'] <= 0) {
					$stmt_create = $pdo_account->prepare("INSERT INTO error_pages (`domain`,`statuscode`, `url`) VALUES (:domain, :statuscode, :url)") or die("insert error <br />". print_r($pdo_account->errorInfo(), true));
					$stmt_create->bindParam(":domain", $domain, PDO::PARAM_STR);
					$stmt_create->bindParam(":statuscode", $statuscode, PDO::PARAM_STR);
					$stmt_create->bindParam(":url", $url_spec, PDO::PARAM_STR);
					// $stmt_create->execute();
					$pdo_account = NULL;

					// $root_dir = 'c:/laragon/www/'.$web_dir.'/';
				 //   if (!file_exists ($root_dir))
				 //      {
				 //          mkdir($root_dir,0777,true);  
					//   }
					// die();
					// $this->ftpAccount($ftp_user, $password, $web_dir);
					if($stmt_create->execute())
					return "ok";
					$pdo_account = NULL;
					return "no ok";
					// header('Location: /home.php');

				}else{
					return "already exist";
				}

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
