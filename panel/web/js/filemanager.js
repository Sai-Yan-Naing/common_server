$(document).on('click','.delete_filedir',function(){
	$path=$(this).attr('path');
	$re_url = $(this).attr('re_url');
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];

	$common_path=$("#common_path").attr('path');
	$action = $(this).attr('action');

	// document.getElementById("display_modal").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/"+$re_url+".php",
	    data: {path:$path,common_path:$common_path,action:$action},
	    success: function(data){
	    	// alert(data)
	    	// alert(document.URL)
	        document.getElementById("changebody").innerHTML = data;
	        $('.download_file').each(function(i, obj) {
			    $temp=$(this).attr('href');
				$(this).attr('href',$temp+'&common_path='+$_path);
			});
	    }
	});
});

$(document).on('click','.open_file',function(){
	$file_name=$(this).attr('file_name');
	$re_url = $(this).attr('re_url');
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
	$common_path=$("#common_path").attr('path');
	document.getElementById("file_open").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/"+$re_url+".php",
	    data: {file_name:$file_name,common_path:$common_path, action:'open_file'},
	    success: function(data){
	    	document.getElementById("file_open").innerHTML = data;
	    }
	});
});

$(document).on('click','#save_file', function(){
	$text_editor_open = $("#text_editor_open").val();
	$openfile_name=$(this).attr('file_name');
	$re_url = $(this).attr('re_url');
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
// alert($openfile_name)
	$common_path=$("#common_path").attr('path');

	$.ajax({
	    type: "POST",
	    url: $url+"/"+$re_url+'.php',
	    data: {text_editor_open:$text_editor_open,openfile_name:$openfile_name,common_path:$common_path, action:'save_file'},
	    success: function(data){
	    	alert(data)
	    	// document.getElementById("file_open").innerHTML = data;
	    }
	});
});

$(document).on('click','.file_rename,.dir_rename',function(){
	$rename = 'file';
	if($(this).hasClass('dir_rename'))
	{
		$rename = 'dir';
	}
	$("#rename_"+$rename).children().children('input').val($(this).attr('file_name'));
})

$(function () {

        $('#upload_newfile,#folder_create,#file_create,#rename_file,#rename_dir').on('submit', function (e) {
// alert(1)
          e.preventDefault();
			$url = document.URL.split('/');
			$url=$url[0]+"//"+$url[2];
			$re_url=$(this).attr('re_url');
			$action=$(this).attr('action');
			$common_path=$("#common_path").attr('path');
			$name=$(this).children().children('input').val();
			$modal = $(this).attr('modal');

			$this=$(this);

			$formdata = new FormData(this);
			$formdata.append('common_path',$common_path);
			$formdata.append('action',$action);
		// alert(2)
		//  event.preventDefault();
			$.ajax({
			    type: "POST",
			    url: $url+"/"+$re_url+".php",
			    data:  $formdata,
			   contentType: false,
			         cache: false,
			   processData:false,
			   beforeSend : function()
			   {
			    $("#"+$modal).modal('hide');
			    // $("#err").fadeOut();
			   },
			    // data: {common_path:$common_path,name:$name, action:'upload'},
			    success: function(data){
			    	// alert(data)
			    	document.getElementById("changebody").innerHTML = data;
			    	$($this).trigger("reset");
			    	$('.download_file').each(function(i, obj) {
					    $temp=$(this).attr('href');
						$(this).attr('href',$temp+'&common_path='+$_path);
					});
			    }
			});

		});
    });


$(document).on('click','.zip_filefolder',function(){
	$path=$(this).attr('path');
	$fun=$(this).attr('fun');
	$re_url = $(this).attr('re_url');
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];

	// document.getElementById("file_open").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/"+$re_url,
	    data: {path:$path,type:$fun},
	    success: function(data){
	    	alert(data);
	    	window.location.href = document.URL;
	    	// document.getElementById("file_open").innerHTML = data;
	    }
	});
});

$(document).on('click',".folder_click",function(){
	// alert(1)
	$foldername=$(this).attr('foldername');
	
	$this=$(this);
	$filepath=$foldername.split('/');
	$_path='';
	console.log($filepath)
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
	$.ajax({
		type:"POST",
		url: $url+"/filemanager_confirm.php",
		data:{foldername:$foldername},
		success:function(data){
			// alert(data)
			document.getElementById("changebody").innerHTML = data;
			// alert($filepath)
			
			$path='<li class="nav-item">'+
                          '<a class="nav-link folder_click text-white" foldername="'+$_path+'"  style="padding: 5px 0; cursor:pointer;">Home<i class="fa fa-home" aria-hidden="true" style="padding:0 5px"></i><i class="fa fa-angle-right" style="padding:0 5px"></i></a>'+
                    '</li>';
                    // alert($foldername)
            if($foldername !='' && $foldername!=null){
            	// alert(1)
            	for (var i = 0; i<=$filepath.length-1; i++) {
						// $_path+='/'+$filepath[i];
						if($_path !='')
						{
							$_path+='/'+$filepath[i];
						}else{
							$_path+=$filepath[i]
						}
						$path+='<li class="nav-item">'+
	                        '<a class="nav-link folder_click text-white" foldername="'+$_path+'" style="padding: 5px 0; cursor:pointer;">'+
	                        $filepath[i]
	                        +'<i class="fa fa-angle-right" style="padding:0 5px"></i></a>'+
	                    '</li>';
	                        
				}
            }
			
			$("#dir_path").html($path);
			$("#common_path").attr('path',$_path);

			$('.download_file').each(function(i, obj) {
			    $temp=$(this).attr('href');
				$(this).attr('href',$temp+'&common_path='+$_path);
			});
			
		}
	})
});

// $(document).on('click','.download_file',function(){
// 	$file_name=$(this).attr('file_name');

// 	$re_url = $(this).attr('re_url');
// 	$url = document.URL.split('/');
// 	$url=$url[0]+"//"+$url[2];

// 	$common_path=$("#common_path").attr('path');

// 	// document.getElementById("display_modal").innerHTML = "loading";
// 	$.ajax({
// 	    type: "POST",
// 	    url: $url+"/"+$re_url+".php",
// 	    data: {common_path: $common_path, file_name:$file_name, action:'download'},
// 	    success: function(data){
// 	    	alert(data)
// 	        // document.getElementById("display_modal").innerHTML = data;
// 	    }
// 	});
// });