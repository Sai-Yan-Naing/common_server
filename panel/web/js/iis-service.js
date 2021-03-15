$(document).on('change','.site-onoff',function(){
	$domain = $(this).attr('id');
	$onoff = "off";
	$app = "";
	if($(this).hasClass('site'))
	{
		$app="site";
	}

	if($(this).hasClass('app'))
	{
		$app="app";
	}

	// alert($(this).hasClass('site'))
	if($(this).prop('checked') == true)
	{
		$onoff= "on";
	}else{
		$onoff= "off";
	}
	// alert($app+$domain+$onoff)
	$url = document.URL.replace('home.php','')
    $.ajax({
		    type: "GET",
		    url: $url+"/site_onoff.php",
		    data: {site_onoff: $domain, onoff: $onoff, app: $app},
		    success: function(data){
		        alert(data);
		    }
		});
});

$(document).on('click','#adnewerror',function(){
	$url = document.URL.replace('dhome.php','')
	$status_code = $("#status_code").val();
	$url_spec = $("#url_spec").val();
	$.ajax({
		    type: "GET",
		    url: $url+"/site_onoff.php",
		    data: {new_error: "new_error", status_code: $status_code, url_spec: $url_spec},
		    success: function(data){
		        alert(data);
				// $result="<div class='row'><div class='col-sm-3'><p class='pl-4'>statuscode</p></div><div class='col-sm-7'><p>path</p></div><div class='col-sm-2'><div class='toggle btn btn-danger off btn-sm' data-toggle='toggle' role='button' style='width: 0px; height: 0px;'><input type='checkbox' data-toggle='toggle' data-onstyle='success' data-offstyle='danger' data-on='ON' data-off='OFF' data-size='sm'><div class='toggle-group'><label for=' class='btn btn-success btn-sm toggle-on'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>ON</font></font></label><label for=' class='btn btn-danger btn-sm toggle-off'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>OFF OFF</font></font></label><span class='toggle-handle btn btn-light btn-sm'></span></div></div></div></div>"
		  //       $("#loop_error").append($result)
		        // alert(document.URL);
		        window.location.href = document.URL;
		        // window.location.replace(document.URL);
		        
		    }
		});
})  