// Admin page

$(document).on("submit","#add_multiple_domain",function(){
	
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
	$url= $url+"/checker.php";

	$domain="domain";
	$checker=$("#"+$domain).val();
	// // $domain_length=8;
	// $domain_minmessage="Domain must be at between 8 and 20 character";
	// $domain_maxmessage="Domain must be at between 8 and 20 character";
	$domain_required="Please enter Domain";
	
	$domain_isexist = sessionStorage.getItem($domain);
	$domain_isexist_error = sessionStorage.getItem($domain+"_error");

	$web_dir="web_dir";
	// $web_dir_length=8;
	$web_dir_minmessage="directory must be at between 8 and 20 character";
	$web_dir_maxmessage="directory must be at between 8 and 20 character";
	$web_dir_required="Please enter web directory";

	$ftp_user="ftp_user";
	// $ftp_user_length=8;
	$ftp_user_minmessage="ftp_user must be at between 8 and 20 character";
	$ftp_user_maxmessage="ftp_user must be at between 8 and 20 character";
	$ftp_user_required="Please enter Ftp User";
	$ftp_isexist = sessionStorage.getItem($ftp_user);
	$ftp_isexist_error = sessionStorage.getItem("username_error");
	
	$password="password";
	// $password_length=8;
	$password_minmessage="password must be at between 8 and 70 character";
	$password_maxmessage="password must be at between 8 and 70 character";
	$password_required="Please enter Password";
	if(required($domain,$domain_required) || minLength($web_dir,8,$web_dir_minmessage) || maxLength($web_dir,20,$web_dir_maxmessage) || required($web_dir,$web_dir_required) ||
		minLength($ftp_user,8,$ftp_user_minmessage) || maxLength($ftp_user,20,$ftp_user_maxmessage) || required($ftp_user,$ftp_user_required)||
		minLength($password,8,$password_minmessage) || maxLength($password,70,$password_maxmessage) || required($password,$password_required) ||
		($domain_isexist === 'true') || ($ftp_isexist === 'true')
		)
	{
		// alert($("#domain_error").text().length+"ok"+($("#domain_error").text()!==""))
		// if(($domain_isexist === 'true'))
		// {
			$("#domain_error").html($domain_isexist_error);
		// }
		// if(($ftp_isexist === 'true'))
		// {
			$("#ftp_user_error").html($ftp_isexist_error);
		// }
		
		
		return false;
	}else{
		return true;
	}
});

$(document).on("blur","#domain, #ftp_user, #db_name, #db_username",function()
{
	$this = $(this);
	$id=$this.attr('id');
	$re_url = $("#"+$this.attr("id")+"_checker_fm").attr('re_url');
	$table = $("#"+$this.attr("id")+"_checker_fm").attr('tb');
	$column = $(this).attr('column');
	$checker = $(this).val();
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
	$url= $url+"/"+$re_url+".php";
	$test="";
	isAvailable($table,$column,$checker,$url, function(d) {
		if(d.includes("is not available"))
		{
			sessionStorage.setItem($column+"_error", $checker+" is not available");
			sessionStorage.setItem($column, true);
			$('#'+$id+'_error').html($checker+" is not available");
		}else{
			$('#'+$id+'_error').html('');
			sessionStorage.setItem($column+"_error", '');
			sessionStorage.setItem($column, false);
		}
		return "ok";
	});

	
})

function isAvailable($table,$column,$checker,$url, callback)
{
  	$.ajax({
	    type: "POST",
	    url:$url,
	    data: {table:$table,column:$column,checker:$checker},  
	}).done(function(data){
		console.log(data);
		callback(data);
	}).fail(function(data)
	{
		alert("error")
	});
}    	

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

	$db_name_isexist = sessionStorage.getItem($db_name);
	$db_name_isexist_error = sessionStorage.getItem($db_name+"_error");
	$db_username_isexist = sessionStorage.getItem("db_user");
	$db_username_isexist_error = sessionStorage.getItem("db_username_error");

	if(minLength($db_name,8,$db_name_minmessage) || maxLength($db_name,70,$db_name_maxmessage) || required($db_name,$db_name_required) ||
	   minLength($db_username,8,$db_username_minmessage) || maxLength($db_username,70,$db_username_maxmessage) || required($db_username,$db_username_required) ||
	   minLength($db_password,8,$db_password_minmessage) || maxLength($db_password,70,$db_password_maxmessage) || required($db_password,$db_password_required)  ||
		($db_name_isexist === 'true') || ($db_username_isexist === 'true'))
	{
		$("#db_name_error").html($db_name_isexist_error);
		$("#db_username_error").html($db_username_isexist_error);
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
	$email_maxmessage="Email must be at between 8 and 70 character";
	$email_required="Please enter Email";

	$mail_pass_word="mail_pass_word";
	// $mail_pass_word_length=8;
	$mail_pass_word_maxmessage="Password must be at between 8 and 70 character";
	$mail_pass_word_required="Please enter password";

	if(maxLength($email,70,$email_maxmessage) || required($email,$email_required) ||
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




     