
<?php require("views/header.php") ?>

<h1 class="captionL">簡単インストール</h1>

<p>下記の簡単インストールを行う際に、MySQLの初期設定が必要になります。<br>
	もし、まだMySQLの初期設定が終わっていない場合は、<br>
	<a href="mysqlform.php">こちら</a>からお願いいたします。</p>
<p>インストール先フォルダを入力して、「インストール」ボタンを押すと、インストールが始まります。<br>
	インストール先フォルダは、「http://<?php echo $domain; ?>/入力フォルダ/」となります。</p>
<p>※1 各プログラムのインストールが完了するまでは、同じプログラムを再度インストールすることができません。<br>
※2 既にWordPressをインストールしているフォルダに、WordPressをインストールすることはできません。</p>
<table class="itemTable" id="itemTableEasy_install">
	<tr>
		<th scope="row"><img src="img/easy_install/ic_wordpress.png" width="32" height="32" alt="">WordPress</th>
		<td><form action="add_wordpress.php" method="post" />
			
			<label>インストール先フォルダ
			<input type="text" name="dir" maxlength="30" value="" class="inputText" />
			</label>
			<?php if($data['wordpress_require'] == 0) : ?>
			<input type="submit" value="インストール" onClick="return confirm('入力内容は、これでよろしいでしょうか。');" class="inputBtn" />
			<br />
			<?php else : ?>
			<font color="#FF0000">現在、インストールはできません。</font>
			<?php endif; ?>
			</form></td>
	</tr>
	<tr>
		<th scope="row"><img src="img/easy_install/ic_eccube.png" width="32" height="32" alt="">EC-CUBE</th>
		<td><form action="add_eccube.php" method="post" />
			
			<label>インストール先フォルダ
			<input type="text" name="dir" maxlength="30" value="" class="inputText" />
			</label>
			<?php if($data['eccube_require'] == 0) : ?>
			<input type="submit" value="インストール" onClick="return confirm('入力内容は、これでよろしいでしょうか。');" class="inputBtn" />
			<br />
			<?php else : ?>
			<font color="#FF0000">現在、インストールはできません。</font>
			<?php endif; ?>
			</form></td>
	</tr>
</table>
<?php require("views/footer.php") ?>
