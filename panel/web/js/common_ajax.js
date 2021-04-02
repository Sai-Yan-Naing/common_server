$(document).on('click','.dis_mysql',function(){
	$db=$(this).attr('db');
	$url = document.URL.replace('database.php','');
	// alert($url);
	document.getElementById("dis_database").innerHTML = "loading";
	$.ajax({
	    type: "GET",
	    url: $url+"/dis_dbaccount.php",
	    data: {db: $db},
	    success: function(data){
	        document.getElementById("dis_database").innerHTML = data;
	    }
	});
});

// edit
$(document).on('click','.edit_dbuser',function(){
	$dbuser=$(this).attr('dbuser');
	$("#edit_dbuserpass").attr("dbuser", $dbuser);
});	

$(document).on('click','#change_db_pass',function(){
	$dbuser=$("#edit_dbuserpass").attr('dbuser');
	$dbpass=$("#edit_dbuserpass").val();
	// alert(1);
	$url = document.URL.replace('database.php','');
	// alert($url);
	document.getElementById("dis_database").innerHTML = "loading";
	$.ajax({
	    type: "GET",
	    url: $url+"/dis_dbaccount.php",
	    data: {dbuser: $dbuser, dbpass: $dbpass, type:"edit"},
	    success: function(data){
	    	// alert(data)
	         window.location.href = document.URL;
	    }
	});
});