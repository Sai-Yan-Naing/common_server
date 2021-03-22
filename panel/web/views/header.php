<?php require_once("header/validation.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<title>【Winserver】 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/contents.css">
<link rel="stylesheet" type="text/css" href="css/server.css">
<link rel="stylesheet" type="text/css" href="css/sidebar.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap4-toggle.min.css">
<script type="text/javascript" src="js/fontawesome.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript" src="js/iis-service.js"></script>
<!-- <script src="js/common.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
</head>
<body>
<div id="header" class="pt-3">
	<div id="headerBox" class="boxHeader">
		<div id="subNav">
			<p id="logo"><a href="home.php"><img src="img/common/header/logo.png" width="135" height="30" alt="Winserver" /></a></p>
			<ul id="subNavMenu">
				<li>
					<form action="logout.php" method="post" />
					<input type="submit" value="ログアウト" id="logout" />
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>
