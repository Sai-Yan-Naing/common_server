<?php
require_once('models/email.php');
$email=$_POST['email'];


$addEmail = new Email;

if(isset($_POST['type']) and $_POST['type']=='new')
{
	$mail_pass_word=$_POST['mail_pass_word'];
	echo $addEmail->addEmail($_COOKIE['d'],$email,$mail_pass_word);
	echo "success";
}else if(isset($_POST['type']) and $_POST['type']=='edit') {
	$mail_pass_word=$_POST['mail_pass_word'];
	$id=$_POST['id'];
	echo $addEmail->changePassword($email,$mail_pass_word,$id);
	echo "success";
}else{
	$id=$_POST['id'];
	echo $addEmail->deleteEmail($email,$id);
	echo "success";
}

header("location: mail_setting.php");
?>