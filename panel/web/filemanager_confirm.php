
<?php
require_once('views/directory_size.php');
require_once("config/all.php");
require_once('models/common.php');
$getweball = new Common;
$getWeb = $getweball->getWebaccount($_COOKIE['d']);
// echo($_FILES['fileToUpload']['name']);
// die('hello');
// echo $_POST['path'];
// echo $_POST['common_path'];
// echo $_POST['action'];
// die();
// PHP program to delete a file named gfg.txt 
// using unlike() function 
   
// $file_pointer = "E:\webroot\LocalUser\New Text Document.txt";
// die($_POST['foldername']);
   
$dir = "E:\webroot\LocalUser/".$getWeb['user'].'/';
// die($_POST['path']);
if(isset($_POST['newfile']) and $_POST['action']=='file_create')
{
	if($_POST['common_path']!=null and $_POST['common_path']!=''){
		$_dir=$dir.$_POST['common_path'].'/';
	}else{
		$_dir=$dir;
	}
	echo createFile($_dir.$_POST['newfile']);
	echo filepath($dir,$_POST['common_path']);
	die();
}else if(isset($_FILES['fileToUpload']) and $_POST['action']=='upload')
{
	if($_POST['common_path']==null || $_POST['common_path']==''){
		$_dir=$dir;
	}else{
		// uploadFile($dir.$_POST['common_path'].'/',$_FILES['fileToUpload']);
		$_dir=$dir.$_POST['common_path'].'/';
	}
	uploadFile($_dir,$_FILES['fileToUpload']);
	echo filepath($dir,$_POST['common_path']);
	die();
}else if(isset($_POST['folder']) and $_POST['action']=='folder_create')
{
	if($_POST['common_path']!=null and $_POST['common_path']!=''){
		// uploadFile($dir.$_POST['common_path'].'/',$_FILES['fileToUpload']);
		$_dir=$dir.$_POST['common_path'].'/';
	}else{
		$_dir=$dir;
	}
	mkdir($_dir.$_POST['folder']);
	echo filepath($dir,$_POST['common_path']);
	die();
}else if(isset($_POST['file_name']) and $_POST['action']=='open_file')
{
	if($_POST['common_path']!=null and $_POST['common_path']!=''){
		$_dir=$dir.$_POST['common_path'].'/';
	}else{
		$_dir=$dir;
	}
	open_file($_dir,$_POST['file_name']);

}else if(isset($_POST['text_editor_open']) and $_POST['action']=='save_file' )
{
	if($_POST['common_path']!=null and $_POST['common_path']!=''){
		$_dir=$dir.$_POST['common_path'].'/';
	}else{
		$_dir=$dir;
	}
	echo save_file($_dir.$_POST['openfile_name'],$_POST['text_editor_open']);
	// die($_dir.$_POST['openfile_name']);
}else if(isset($_POST['path']) and $_POST['type']=='zip')
{
	echo compressed($_POST['path']);
	die('zip');
}else if(isset($_POST['foldername']))
{
	// array_push($_SESSION['cart'],$_POST['foldername']);
	echo filepath($dir,$_POST['foldername']);
	die();
}else if(isset($_GET['download']))
{
	// die($dir.$_GET['download']);
	download($_GET['common_path'],$getWeb['user'],$_GET['download']);
	// header("Location: filemanager.php");
}else if(isset($_POST['path']) and $_POST['action'] =='delete_file')
{
	if($_POST['common_path']!=null and $_POST['common_path']!=''){
		$_dir=$dir.$_POST['common_path'].'/';
	}else{
		$_dir=$dir;
	}
	unlink($_dir.$_POST['path']);
	filepath($dir,$_POST['common_path']);
}else if(isset($_POST['file_rename']) and $_POST['action']=='rename_file')
{
	if($_POST['common_path']==null || $_POST['common_path']==''){
		$_dir=$dir;
	}else{
		// uploadFile($dir.$_POST['common_path'].'/',$_POST['file_rename']);
		$_dir=$dir.$_POST['common_path'].'/';
	}
	rename($_dir.$_POST['origin_name'],$_dir.$_POST['file_rename']);
	echo filepath($dir,$_POST['common_path']);
	die();
}else if(isset($_POST['dir_rename']) and $_POST['action']=='rename_dir')
{
	if($_POST['common_path']==null || $_POST['common_path']==''){
		$_dir=$dir;
	}else{
		$_dir=$dir.$_POST['common_path'].'/';
	}
	rename($_dir.$_POST['origin_name'],$_dir.$_POST['dir_rename']);
	echo filepath($dir,$_POST['common_path']);
	die();
}else if(isset($_POST['path']) and $_POST['action']=='delete_dir')
{
	if($_POST['common_path']!=null and $_POST['common_path']!=''){
		$_dir=$dir.$_POST['common_path'].'/';
	}else{
		$_dir=$dir;
	}
	delete_directory($_dir.$_POST['path']);;
	filepath($dir,$_POST['common_path']);
}else{
	// delete_directory($dir.$_POST['path']);
	echo "error";
}
die();
// echo $_POST['path'];

   
function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     if (!$dir_handle)
          return false;
     while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     delete_directory($dirname.'/'.$file);
           }
     }
     closedir($dir_handle);
     rmdir($dirname);
     return true;
}

function createFile($file)
{
	// $file="E:\webroot\LocalUser/test1.php";
	$myfile = fopen("$file", "w") or die("Unable to open file!");
	fclose($myfile);
	// return "created new File";
}

function uploadFile($dir,$file)
{
	$target_dir = $dir;
	$target_file = $target_dir . basename($file["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	// if(isset($_POST["submit"])) {
	//   $check = getimagesize($file["tmp_name"]);
	//   if($check !== false) {
	//     echo "File is an image - " . $check["mime"] . ".";
	//     $uploadOk = 1;
	//   } else {
	//     echo "File is not an image.";
	//     $uploadOk = 0;
	//   }
	// }

	// Check if file already exists
	if (file_exists($target_file)) {
	  echo "Sorry, file already exists.";
	  $uploadOk = 0;
	  die();
	}

	// Check file size
	if ($file["size"] > 500000) {
	  echo "Sorry, your file is too large.";
	  $uploadOk = 0;
	}

	// Allow certain file formats
	// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	// && $imageFileType != "gif" ) {
	//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	//   $uploadOk = 0;
	// }

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($file["tmp_name"], $target_file)) {
	    // echo "The file ". htmlspecialchars( basename( $file["name"])). " has been uploaded.";
	  } else {
	    echo "Sorry, there was an error uploading your file.";
	  }
	}
}

function download($path,$user,$download)
{
	$filename=$download;
	if($path!=null)
	{
		$file="E:\\webroot\\LocalUser\\$user\\$path\\$filename";
	}else{
		$file="E:\\webroot\\LocalUser\\$user\\$filename";
	}
	
	$len = filesize($file); // Calculate File Size
	ob_clean();
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public"); 
	header("Content-Description: File Transfer");
	header("Content-Type:application/pdf"); // Send type of file
	$header="Content-Disposition: attachment; filename=$filename;"; // Send File Name
	header($header );
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".$len); // Send File Size
	@readfile($file);
	exit;
}

function open_file($dir,$file_name)
{
	$file = $dir.$file_name;

	// check if form has been submitted
	if (isset($_POST['text']))
	{
	    // save the text contents
	    file_put_contents($file, $_POST['text']);

	    // redirect to form again
	    // header(sprintf('Location: %s', $url));
	    // printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
	    // exit();
	}

	// read the textfile
	$text = file_get_contents($file);
	?>

		<div class="modal-header">
            <button type="button" class="btn btn-success mr-3" id="save_file" file_name="<?= $file_name ?>"  re_url="filemanager_confirm">Save</button>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="filemanager_confirm.php" method="post" id="file_editer">
              <div class="form-group">
                <textarea class="text-white bg-dark" id="text_editor_open" rows="25"><?php echo htmlspecialchars($text) ?></textarea>
              </div>
            </form>
          </div>

<?php
}

function save_file($file,$data)
{
	// $dir = 'E:\\webroot\\LocalUser\\';
	// file_put_contents($dir.$file, $data);
	file_put_contents($file, $data);
	return "successfully saved";
}

function compressed($name)
{
	// Enter the name of directory
	$pathdir = 'E:\\webroot\\LocalUser\\'; 
	  
	// Enter the name to creating zipped directory
	$zipcreated = 'test.zip';
	  
	// Create new zip class
	$zip = new ZipArchive;
	   
	if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE) {
	      
	    // Store the path into the variable
	    $dir = opendir($pathdir);
	       
	    while($file = readdir($dir)) {
	        if(is_file($pathdir.$file)) {
	            $zip -> addFile($pathdir.$file, $file);
	        }
	    }
	    $zip ->close();
	    return "zipped";
	}
	return "no zip";
}


	function filepath($dir,$foldername)
	{
		// return $getWeb;
		if($foldername=="" || $foldername==null)
		{
			$dir    = $dir.$foldername;
		}else{
			$dir    = $dir.$foldername.'/';
		}
		
        $myfiles = array_diff(scandir($dir,1), array('.', '..')); 

        // $dir = '/master/files';
        $directories = array();
        $files_list  = array();
        $files = scandir($dir);
        foreach($files as $file){
           if(($file != '.') && ($file != '..')){
              if(is_dir($dir.'/'.$file)){
                 $directories[]  = $file;

              }else{
                 $files_list[]    = $file;

              }
           }
        }
        foreach ($directories as $key => $value) {
		?>

		<tr>
          <th  class="align-baseline folder_click" foldername="<?php if($foldername!=null){ echo $foldername.'/'.$value;}else{echo $value;} ?>" style="cursor: pointer;">
          	<i class="fas fa-folder text-warning fa-lg"></i>
          	<span><?= $value ?></span>
          </th>
          <th>
          	<?= date("Y-m-d h:i:sA", filemtime($dir.$value)) ?>
          </th>
          <th>
          	<?= filetype($dir.$value)?>
          </th>
          <th>
          	<?php echo sizeFormat(folderSize($dir.$value)) ?>
       	  </th>
          <th class="row" colspan="2">
          	<span class=" col-sm-3"></span>
          	<button class="btn text-secondary zip_filefolder col-sm-3" re_url="filemanager_confirm.php" path="<?=$value?>" fun="zip">
          		<i class="fas fa-file-archive"></i>
          	</button>
            <button class="btn text-info col-sm-3 dir_rename" data-toggle="modal" data-target="#dir_rename" file_name="<?= $value ?>" re_url="filemanager_confirm">
              	<i class="fas fa-edit text-warning"></i>
            </button>
          	<button class="btn text-danger delete_filedir col-sm-3" re_url="filemanager_confirm" path="<?=$value?>" action="delete_dir">
          		<i class="far fa-trash-alt"></i>
          	</button>
          </th>
        </tr>
        <?php 
    	}
        foreach ($files_list as $key => $value) {
            ?>
            <tr>
              <th class="align-baseline open_file" style="cursor: pointer;" data-toggle="modal" data-target="#open_file" file_name="<?= $value ?>" re_url="filemanager_confirm">
              	<div><i class="fas fa-file text-secondary fa-lg"></i> <?= $value ?></div>
              </th>
              <th>
              	<?= date("Y-m-d h:i:sA", filemtime($dir.$value)) ?>
              </th>
              <th>
              	<?= filetype($dir.$value)?>
              </th>
              <th path="<?=$dir?>" file="<?=$value?>">
              	<?php echo sizeFormat(filesize($dir.$value)) ?>
              </th>
              <th class="row" colspan="2">
              	<a href="filemanager_confirm.php?download=<?=$value?>" class="btn text-success col-sm-3 download_file">
              		<i class="fa fa-download"></i>
              	</a>
                <button class="btn text-secondary col-sm-3" re_url="filemanager_confirm.php" path="<?=$value?>">
                	<i class="fas fa-file-archive"></i>
                </button>
              	<button class="btn text-info col-sm-3 file_rename" data-toggle="modal" data-target="#file_rename" file_name="<?= $value ?>" re_url="filemanager_confirm">
              		<i class="fas fa-edit text-warning"></i>
              	</button>
                <button class="btn text-danger delete_filedir col-sm-3" re_url="filemanager_confirm" path="<?=$value?>" action="delete_file">
                	<i class="far fa-trash-alt"></i>
                </button>
            </th>
            </tr>
        <?php
        }
        ?>
<?php
	}
  
?> 
