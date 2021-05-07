<?php
  
//Enter the name of directory
   $pathdir = "Directory Name/";
   $pathdir="E:\\webroot\\LocalUser\\testing";
//Enter the name to creating zipped directory
   $zipcreated = "test.zip";
//Create new zip class
   $newzip = new ZipArchive;
   if($newzip -> open($zipcreated, ZipArchive::CREATE ) === TRUE) {
      $dir = opendir($pathdir);
      while($file = readdir($dir)) {
         if(is_file($pathdir.$file)) {
            $newzip -> addFile($pathdir.$file, $file);
            echo "zip1".$i++;
         }
      }

      $newzip ->close();
      echo "zip";
      die();
   }
   die('undip');
  
?>