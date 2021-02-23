<?php require_once("header/dvalidation.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<title>【Winserver】 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/contents.css">
<link rel="stylesheet" href="css/server.css">
<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="js/common.js"></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</head>
<body>
<div id="header" class="pt-3">
	<div id="headerBox" class="boxHeader">
		<div id="subNav">
			<p id="logo"><a href="dhome.php"><img src="img/common/header/logo.png" width="135" height="30" alt="Winserver" /></a></p>
			<ul id="subNavMenu" class="mt-2">
				<li>
					<form action="logout.php" method="post" />
					<input type="submit" value="ログアウト" id="logout" />
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>
