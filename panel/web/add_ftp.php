<?php
require_once('models/ftp.php');

// echo "string";
// die();

$addFtp = new Ftp;

if(isset($_POST['type']) and $_POST['type']=='add_new')
{
	$ftpuser=$_POST['ftpuser'];
	$ftp_pass_word=$_POST['ftp_pass_word'];
	$ftp_folder=$_POST['ftp_folder'];
	echo $addFtp->addFtp($_COOKIE['d'],$ftpuser,$ftp_pass_word,$ftp_folder);
	echo "success";
}else if(isset($_POST['type']) and $_POST['type']=='edit') {
	 $edit_ftp_pass=$_POST['edit_ftp_pass'];
	 $fid=$_POST['fid'];
	 $addFtp->changePassword($edit_ftp_pass,$fid);
	echo "success";
}else{
	$ftpuser=$_POST['ftp'];
	$fid=$_POST['fid'];
	$path=$_POST['path'];
	echo $addFtp->deleteFtp($ftpuser,$fid,$path);
	echo "success";
}

?>