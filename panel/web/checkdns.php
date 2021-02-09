<?php
$domain=$_POST['domain'];
 error_reporting(0);
if(gethostbyname($domain) != $domain) {
  echo $domain." - is not available";
} else {
  echo $domain." - is available";
}
?>