<?php
require_once('models/ftp.php');

// echo "string";
// die();

$addFtp = new Ftp;

if(isset($_POST['type']) and $_POST['type']=='add_new')
{
	$ftpuser=$_POST['ftpuser'];
	$permission=$_POST['permission'];
	$ftp_pass_word=$_POST['ftp_pass_word'];
	echo $addFtp->addFtp($_COOKIE['d'],$ftpuser,$ftp_pass_word,$permission);
	echo "success";
}else if(isset($_POST['type']) and $_POST['type']=='edit') {
	 $ftpuser=$_POST['ftpuser'];
	 $ftp_pass_word=$_POST['ftp_pass_word'];
	 $id=$_POST['id'];
	 $permission=$_POST['permission'];
	 $addFtp->changePassword($ftpuser,$ftp_pass_word,$id,$permission);
	echo "success";
}else{
	$id=$_POST['id'];
	$username=$_POST['username'];
	echo $addFtp->deleteFtp($username,$id);
	echo "success";
}

header("location: ftp.php");

?>