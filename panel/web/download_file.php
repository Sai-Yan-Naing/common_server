<?php
		
		$path="E:\webroot\LocalUser\New Text Document.tx";
       $f="New Text Document.txt";   

       $link = "downloads";
symlink($path, $link);
echo readlink($link);
echo "download success";

  ?>

  <?php
// $target = "downloads.php";
// $link = "downloads";
// symlink($target, $link);
// echo readlink($link);
?>