<?php

require_once('models/mysql.php');
require_once('models/install_app.php');

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
setcookie("url", $url, time() + 3600);

	$mysql = new MySQL;
	$mysql->addUserAndDB($db_name, $db_username, $db_password);
	echo "create new database success";


$zip = new ZipArchive; 
// $appInstall = new appInstall; 
  
// Zip File Name 

if($app=="wordpress"){
	$wep_app='c:/laragon/www/wordpress-5.6.2.zip';
}else{
	$wep_app='c:/laragon/www/ec-cube.zip';
}
// copy('c:/laragon/www/app/wp-config.php', 'c:/laragon/www/'.$_COOKIE['d'].'/wordpress/wp-config.php');
// 	$path_to_file = 'c:/laragon/www/'.$_COOKIE['d'].'/wordpress/wp-config.php';
// 	$file_contents = file_get_contents($path_to_file);
// 	$file_contents = str_replace("wp_dbname",$db_name,$file_contents);
// 	$file_contents = str_replace("wp_username",$db_username,$file_contents);
// 	$file_contents = str_replace("wp_password",$db_password,$file_contents);
// 	file_put_contents($path_to_file,$file_contents);
// 	// for sql
// 	copy('c:/laragon/www/app/wp-sql.sql', 'c:/laragon/www/'.$_COOKIE['d'].'/wordpress/wp-sql.sql');
// 	$sql_file = 'c:/laragon/www/'.$_COOKIE['d'].'/wordpress/wp-sql.sql';
// 	$sql_contents = file_get_contents($sql_file);
// 	$sql_contents = str_replace("wp_dbname",$db_name,$sql_contents);
// 	$sql_contents = str_replace("wp_site_title",$site_name,$sql_contents);
// 	$sql_contents = str_replace("wp_username",$username,$sql_contents);
// 	$sql_contents = str_replace("wp_email@gmail.com",$email,$sql_contents);
// 	$sql_contents = str_replace("wp_url",$url,$sql_contents);
// 	file_put_contents($sql_file,$sql_contents);
// $import = file_get_contents('c:/laragon/www/'.$_COOKIE['d'].'/wordpress/wp-sql.sql');
// $mysql->importWP($import,$db_name,$db_username,$db_password);
// 	die();

if ($zip->open($wep_app) === TRUE) { 
  
    // Unzip Path 
    $zip->extractTo('c:/laragon/www/'.$_COOKIE['d']); 
    $zip->close(); 
    echo 'Unzipped Process Successful!'; 
    copy('c:/laragon/www/app/wp-config.php', 'c:/laragon/www/'.$_COOKIE['d'].'/wordpress/wp-config.php');
	$path_to_file = 'c:/laragon/www/'.$_COOKIE['d'].'/wordpress/wp-config.php';
	$file_contents = file_get_contents($path_to_file);
	$file_contents = str_replace("wp_dbname",$db_name,$file_contents);
	$file_contents = str_replace("wp_username",$db_username,$file_contents);
	$file_contents = str_replace("wp_password",$db_password,$file_contents);
	file_put_contents($path_to_file,$file_contents);
	// for sql
	copy('c:/laragon/www/app/wp-sql.sql', 'c:/laragon/www/'.$_COOKIE['d'].'/wordpress/wp-sql.sql');
	$sql_file = 'c:/laragon/www/'.$_COOKIE['d'].'/wordpress/wp-sql.sql';
	$sql_contents = file_get_contents($sql_file);
	$sql_contents = str_replace("wp_dbname",$db_name,$sql_contents);
	$sql_contents = str_replace("wp_site_title",$site_name,$sql_contents);
	$sql_contents = str_replace("wp_username",$username,$sql_contents);
	$sql_contents = str_replace("wp_password",md5($password),$sql_contents);
	$sql_contents = str_replace("wp_email@gmail.com",$email,$sql_contents);
	$sql_contents = str_replace("wp_url",$url,$sql_contents);
	file_put_contents($sql_file,$sql_contents);
	$import = file_get_contents('c:/laragon/www/'.$_COOKIE['d'].'/wordpress/wp-sql.sql');
	// echo $mysql->importWP($import,$db_name,$db_username,$db_password);
	if($mysql->importWP($import,$db_name,$db_username,$db_password))
	{
		header('Location: app_login.php');
	}else{
		echo "import fail";
	}
    // $appInstall->addWordpress($app,$version,$url,$site_name,$username,$email,$password,$db_name,$db_username,$db_password);
} else { 
    echo 'Unzipped Process failed'; 
} 


die();
?>