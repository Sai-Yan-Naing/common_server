<?php
	setcookie('p', '', time() - 3600);
	header('Location: /login.php');
?>