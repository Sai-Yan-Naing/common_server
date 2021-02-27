<?php

require_once('models/mysql.php');

$app = $_POST["app"];
$version = $_POST["version"];
$url = $_POST["url"];
$site_name = $_POST["site_name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$db_name = $_POST["db_name"];
$db_username = $_POST["db_username"];
$db_password = $_POST["db_password"];

	$mysql = new MySQL;
	$mysql->addUserAndDB($db_name, $db_username, $db_password);
	echo "success";


$zip = new ZipArchive; 
  
// Zip File Name 


if($app=="wordpress"){
	$wep_app='c:/laragon/www/wordpress-5.6.2.zip';
}else{
	$wep_app='c:/laragon/www/ec-cube.zip';
}

if ($zip->open($wep_app) === TRUE) { 
  
    // Unzip Path 
    $zip->extractTo('c:/laragon/www/'.$_COOKIE['d']); 
    $zip->close(); 
    echo 'Unzipped Process Successful!'; 
} else { 
    echo 'Unzipped Process failed'; 
} 


die();
?>