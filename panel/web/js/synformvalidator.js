function minLength($id,$num,$message)
{
	$error = $("#"+$id+"_error");
	if($("#"+$id).val().length<$num && $("#"+$id).val().length>0){
		$("#"+$id).focus();
		$error.html($message);
		return true;
	}else{
		$error.html("");
		return false;
	}
}

function maxLength($id,$num,$message)
{
	$error = $("#"+$id+"_error");
	if($("#"+$id).val().length>$num){
		$("#"+$id).focus();
		$error.html($message);
		return true;
	}else{
		$error.html("");
		return false;
	}
}

function required($id,$message)
{
	$error = $("#"+$id+"_error");
	if($("#"+$id).val()=="" || $("#"+$id).val()==null){
		$("#"+$id).focus();
		$error.html($message);
		return true;
	}else{
		$error.html("");
		return false;
	}
}

function required_checkbox($id,$message)
{
	$cb="";
	$idd=$id+"[]";
	$.each($("input[name='"+$idd+"']:checked"), function(){
        $cb = $cb + $(this).val();
    });
	$error = $("#"+$id+"_error");
	if($cb=="" || $cb==null){
		$("#"+$id).focus();
		$error.html($message);
		return true;
	}else{
		$error.html("");
		return false;
	}
}