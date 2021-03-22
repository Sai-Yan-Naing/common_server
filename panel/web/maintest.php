<?php
require_once('config/all.php');
require_once('models/account.php');
try {
			$pdo_account = new PDO(DSN, ROOT, ROOT_PASS);

			// for domain
			$stmt = $pdo_account->prepare("SELECT error_pages FROM web_account WHERE `domain` = ?");
			$stmt->execute(array("setmawhtay.com"));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			$test=$data['error_pages'];
			$error_pages['statuscode'] = 789;
			$error_pages['url'] =  "hello";
			// $temp=json_decode($test);
			// $temp[]=$error_pages;
			foreach (json_decode($test) as $key => $value) {
				if($value->statuscode=="504"){
					$temp[$key]['statuscode']=123;
					$temp[$key]['url']=$value->url;
				}else{
					$temp[$key]['statuscode']=$value->statuscode;
					$temp[$key]['url']=$value->url;
				}
				
				// echo "string";
			}
			print_r(json_encode($temp));
			// print_r($test);
				
			} catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$error_message = "データベースへの接続エラーです。";
			require("views/allerror.php");
			$pdo_account = NULL;
			die();
		}
?>