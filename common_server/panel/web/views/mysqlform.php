
<?php require("views/header.php") ?>

<h1 class="captionL">MySQL追加</h1>

<p>以下のフォームに情報を入力して、「データベースを作成」ボタンを押せば、データベースが作成されます。<p>
<p class="attention">※入力文字としてご利用いただけるのは、半角英数字のみとなります。<br />
記号等を含む文字列をご入力いただいた場合、MySQLをご利用いただけないことがございます。</p>

<form action="mysqlconfirm.php" method="post" />
<p>データベース名<br />
<input type="text" name="db" class="inputText" />
</p>

<p>ユーザー名<br />
<input type="text" name="db_user" class="inputText" />
</p>

<p>パスワード<br />
<input type="text" name="db_password" class="inputText" /></p>

<input type="submit" value="データベースを作成" onClick="return confirm('入力内容は、これでよろしいでしょうか。');" class="inputBtn" id="mySqlBtn" />
</form>

<p class="attention">※MySQLのデータベースは1つしか作ることができません。<br />
2つ以上ご利用いただく場合は、お手数ですが、<br />
データベース追加オプションをお申込みください。<br /></p>

<?php require("views/footer.php") ?>
