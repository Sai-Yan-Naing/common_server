<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<title>【Winserver】 管理画面</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/contents.css">
</head>
<body>
<div id="header">
	<div id="headerBox">
		<div id="subNav">
			<p id="logo"><a href="top.php"><img src="img/common/header/logo.png" width="135" height="30" alt="Winserver" /></a></p>
			<ul id="subNavMenu">
				<li>
					<form action="logout.php" method="post" />
					<input type="submit" value="ログアウト" id="logout" />
					</form>
				</li>
				<li id="manual"><a href="manuals/" target="_blank">マニュアル</a></li>
			</ul>
		</div>
		<ul id="nav">
			<li id="navMyspl"><a href="mysqlform.php">MySQL追加</a></li>
			<li id="navSite"><a href="site_manage.php">サイトの管理</a></li>
			<li id="navApplication"><a href="app_list.php">アプリケーションの管理</a></li>
			<li id="navPassword"><a href="ch_pass.php">パスワード変更</a></li>
			<li id="navEasyInstall"><a href="easy_install.php">簡単インストール</a></li>
		</ul>
	</div>
</div>
<div id="contents">
