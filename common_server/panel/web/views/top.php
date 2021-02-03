<?php require("views/header.php") ?>

<h1 class="captionL">管理画面TOP</h1>

<table class="itemTable" id="functionList">
	<tr>
		<th scope="row"><a href="mysqlform.php" id="navMyspl">MySQL追加</a></th>
		<td>MySQLのデータベースを作成・追加することができます。</td>
	</tr>
	<tr>
		<th scope="row"><a href="mssqlform.php" id="navMsspl">Microsoft SQL Server追加</a></th>
		<td>Microsoft SQL Serverのデータベースを作成・追加することができます。</td>
	</tr>
	<tr>
		<th scope="row"><a href="site_manage.aspx" id="navSite">サイトの管理</a></th>
		<td>サイトの起動・再起動管理を行うことができます。</td>
	</tr>
	<tr>
		<th scope="row"><a href="app_list.aspx" id="navApplication">アプリケーションの管理</a></th>
		<td>.NET Frameworkのバージョン変更、アプリケーションプールに仮想ディレクトリを追加・削除することができます。</td>
	</tr>
	<tr>
		<th scope="row"><a href="ch_pass.php" id="navPassword">パスワード変更</a></th>
		<td>管理画面とFTPのパスワードを変更することができます。</td>
	</tr>
	<tr>
		<th scope="row"><a href="siteguard.php" id="navSiteGuard">SiteGuard</a></th>
		<td>URLベースでサイトへの接続を許可／監視／拒否することができます。</td>
	</tr>
	<tr>
		<th scope="row"><a href="easy_install.php" id="navEasyInstall">簡単インストール</a></th>
		<td>WordPressとEC-CUBEの設定を簡単に行えます。</td>
	</tr>
</table>


<?php
require("views/footer.php");