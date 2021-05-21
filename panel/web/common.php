<?php

function app_version($dir)
{
	$app_path="G:/application/";
	$dir=$app_path.$dir;
	$files = scandir($dir);

	foreach($files as $file){
	   if(($file != '.') && ($file != '..')){
	      if(is_dir($dir.'/'.$file)){
	         $version[]  = $file;

	      }
	   }
	}
	return $version;
}

	function copy_paste($src, $dst) { 
	    // open the source directory
	    $dir = opendir($src); 
	    // Make the destination directory if not exist
	    if(!is_dir($dst)){
	        //Directory does not exist, so lets create it.
	        @mkdir($dst, 0755, true);
	    }
	    //@mkdir($dst); 
	    // Loop through the files in source directory
	    while( $file = readdir($dir) ) { 
	        if (( $file != '.' ) && ( $file != '..' )) { 
	            if ( is_dir($src . '/' . $file) ) { 
	                // Recursively calling custom copy function
	                // for sub directory 
	                copy_paste($src . '/' . $file, $dst . '/' . $file); 

	            }else { 
	                copy($src . '/' . $file, $dst . '/' . $file); 
	            } 
	        } 
	    } 
	    closedir($dir);
	} 


?>