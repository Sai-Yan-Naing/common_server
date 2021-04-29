// for Database form

$(document).on("submit","#database_create",function(){
	$db_name="db_name";
	// $db_name_length=8;
	$db_name_minmessage="Database name must be at between 8 and 70 character";
	$db_name_maxmessage="Database name must be at between 8 and 70 character";
	$db_name_required="Please enter Database name";

	$db_username="db_username";
	// $db_username_length=8;
	$db_username_minmessage="Username must be at between 8 and 70 character";
	$db_username_maxmessage="Username must be at between 8 and 70 character";
	$db_username_required="Please enter Username";

	$db_password="db_password";
	// $db_password_length=8;
	$db_password_minmessage="Password must be at between 8 and 70 character";
	$db_password_maxmessage="Password must be at between 8 and 70 character";
	$db_password_required="Please enter password";

	if(minLength($db_name,8,$db_name_minmessage) || maxLength($db_name,70,$db_name_maxmessage) || required($db_name,$db_name_required) ||
	   minLength($db_username,8,$db_username_minmessage) || maxLength($db_username,70,$db_username_maxmessage) || required($db_username,$db_username_required) ||
	   minLength($db_password,8,$db_password_minmessage) || maxLength($db_password,70,$db_password_maxmessage) || required($db_password,$db_password_required))
	{
		return false;
	}else{
		return true;
	}
});

$(document).on("submit","#database_edit",function(){
	// alert(1)
	$db_password="db_password";
	// $db_password_length=8;
	$db_password_minmessage="Password must be at between 8 and 70 character";
	$db_password_maxmessage="Password must be at between 8 and 70 character";
	$db_password_required="Please enter password";
	if(minLength($db_password,8,$db_password_minmessage) || maxLength($db_password,70,$db_password_maxmessage) || required($db_password,$db_password_required))
	{
		return false;
	}else{
		return true;
	}
});

// End database form

// For Email form
$(document).on("submit","#email_create",function(){
	$email="email";
	// $email_length=8;
	$email_minmessage="Email must be at between 8 and 70 character";
	$email_maxmessage="Email must be at between 8 and 70 character";
	$email_required="Please enter Email";

	$mail_pass_word="mail_pass_word";
	// $mail_pass_word_length=8;
	$mail_pass_word_minmessage="Password must be at between 8 and 70 character";
	$mail_pass_word_maxmessage="Password must be at between 8 and 70 character";
	$mail_pass_word_required="Please enter password";

	if(minLength($email,8,$email_minmessage) || maxLength($email,70,$email_maxmessage) || required($email,$email_required) ||
	   minLength($mail_pass_word,8,$mail_pass_word_minmessage) || maxLength($mail_pass_word,70,$mail_pass_word_maxmessage) || required($mail_pass_word,$mail_pass_word_required))
	{
		return false;
	}else{
		return true;
	}
});

$(document).on("submit","#email_edit",function(){
	$mail_pass_word="mail_pass_word";
	// $mail_pass_word_length=8;
	$mail_pass_word_minmessage="Password must be at between 8 and 70 character";
	$mail_pass_word_maxmessage="Password must be at between 8 and 70 character";
	$mail_pass_word_required="Please enter password";

	if(minLength($mail_pass_word,8,$mail_pass_word_minmessage) || maxLength($mail_pass_word,70,$mail_pass_word_maxmessage) || required($mail_pass_word,$mail_pass_word_required))
	{
		return false;
	}else{
		return true;
	}
});

// End Email


// For FTP form
$(document).on("submit","#ftp_create",function(){
	$ftpuser="ftpuser";
	// $ftpuser_length=8;
	$ftpuser_minmessage="FTP must be at between 8 and 70 character";
	$ftpuser_maxmessage="FTP must be at between 8 and 70 character";
	$ftpuser_required="Please enter FTP";

	$ftp_pass_word="ftp_pass_word";
	// $ftp_pass_word_length=8;
	$ftp_pass_word_minmessage="Password must be at between 8 and 70 character";
	$ftp_pass_word_maxmessage="Password must be at between 8 and 70 character";
	$ftp_pass_word_required="Please enter password";

	$permission="permission";
	$permission_required="Please check permission";

	if(minLength($ftpuser,8,$ftpuser_minmessage) || maxLength($ftpuser,70,$ftpuser_maxmessage) || required($ftpuser,$ftpuser_required) ||
	   minLength($ftp_pass_word,8,$ftp_pass_word_minmessage) || maxLength($ftp_pass_word,70,$ftp_pass_word_maxmessage) || required($ftp_pass_word,$ftp_pass_word_required)
	   || required_checkbox($permission,$permission_required))
	{
		return false;
	}else{
		return true;
	}
});

$(document).on("submit","#ftp_edit",function(){
	$ftp_pass_word="ftp_pass_word";
	// $ftp_pass_word_length=8;
	$ftp_pass_word_minmessage="Password must be at between 8 and 70 character";
	$ftp_pass_word_maxmessage="Password must be at between 8 and 70 character";
	$ftp_pass_word_required="Please enter password";

	$permission="permission";
	$permission_required="Please check permission";

	if(minLength($ftp_pass_word,8,$ftp_pass_word_minmessage) || maxLength($ftp_pass_word,70,$ftp_pass_word_maxmessage) || required($ftp_pass_word,$ftp_pass_word_required)
	   || required_checkbox($permission,$permission_required))
	{
		return false;
	}else{
		return true;
	}
});

// End FTP




     