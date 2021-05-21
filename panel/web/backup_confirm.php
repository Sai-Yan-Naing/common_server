<?php
require_once("config/all.php");
require_once('models/common.php');
require_once('models/backup.php');
$date = date("Y-m-d");
$getweball = new Common;
$getWeb = $getweball->getWebaccount($_COOKIE['d']);
$user = $getWeb['user'];
$dirname = "G:/backup/$user/";



if (!$user) {
	die('error');
}
// die($_POST['user']);
	if(isset($_POST['action']) and $_POST['action']=="delete"){
    	
        deleteBackup($dirname);
        result($dirname);
    }else if(isset($_POST['action']) and $_POST['action']=="backup"){
    	
        $src = "E:/webroot/LocalUser/$user";
        $directory = "G:/backup/$user";
        $dst = "$directory/$user-$date";
        if(is_dir($directory)){
            deleteBackup($directory);
        }
        custom_copy($src, $dst);
        result($dirname);
    }else if(isset($_POST['action']) and $_POST['action']=="restore"){
    	
    	$file = showFolder($dirname);
    	$src = "G:/backup/$user/$file/";
        $dst = "E:/webroot/LocalUser/$user";
        if(is_dir($dst)){
            deleteBackup($dst);
        }
        custom_copy($src, $dst);
        result($dirname);
        
    }else if(isset($_POST['action']) and $_POST['action']=="auto_backup")
    {
    	$backup = new Backup;

		$backup->addAutoBackup($_COOKIE['d'],$user,$_POST['data']);

    	die("auto_backup");
    }
    die();

    /*Delete Folder*/
    function deleteBackup($dir){  
        // Assigning files inside the directory
        $dir = new RecursiveDirectoryIterator(
            $dir, FilesystemIterator::SKIP_DOTS);
        // Reducing file search to given root
        // directory only
        $dir = new RecursiveIteratorIterator(
            $dir,RecursiveIteratorIterator::CHILD_FIRST);
        // Removing directories and files inside
        // the specified folder
        foreach ( $dir as $file ) { 
            $file->isDir() ?  rmdir($file) : unlink($file);
        }
        
    }  

     /*Backup Folder*/
    function custom_copy($src, $dst) { 
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
                    custom_copy($src . '/' . $file, $dst . '/' . $file); 
    
                }else { 
                    copy($src . '/' . $file, $dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir);
    } 

    /*Show Backup Folder*/
    function showFolder($dir){
        // Open a directory, and read its contents
        if (is_dir($dir)){
            if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                if(($file != '.') && ($file != '..')){
                    return  $file ;
                }
            }
            closedir($dh);
            }
        } 
    }  

    function result($dirname)
    {
    	$file = showFolder($dirname);
    	if($file)
    	{
    	?>
	    	<table class="table mt-3 table-bordered">
	            <thead>
	              <tr>
	                <th>バックアップデータ</th>
	                <th>Date</th>
	                <th>Action</th>
	              </tr>
	            </thead>
	            <tbody>
	              <tr>
	                <td><?= $file ?></td>
	                <td><?= date("Y-m-d h:i:sA", filemtime($dirname.$file)) ?></td>
	                <td>
	                    <button type="submit" class="btn btn-warning btn-sm mb-2 mr-3 data_backup" re_url="backup_confirm" action="restore">リストア</button>
	                    <button type="submit" class="btn btn-danger btn-sm mb-2 data_backup" re_url="backup_confirm" action="delete">削除</button>
	                </td>
	              </tr>
	            </tbody>
	        </table>
    <?php
		}
} 

?>