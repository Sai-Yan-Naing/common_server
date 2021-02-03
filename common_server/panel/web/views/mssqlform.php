
<?php require("views/header.php") ?>

<h1 class="captionL">Microsoft SQL Server追加</h1>

<p>以下のフォームに情報を入力して、「データベースを作成」ボタンを押せば、データベースが作成されます。<br />
※利用できるのは、半角英数字のみとなります。</p>


<form action="mssqlconfirm.php" method="post" />
<p>バージョン<br />
<select name="version" class="Select">
<option value="2016">Microsoft SQL Server 2016</option>
<option value="2014">Microsoft SQL Server 2014</option>
</select>
</p>

<p>データベース名<br />
<input type="text" name="db" class="inputText" />
</p>

<p>ユーザー名<br />
<input type="text" name="db_user" class="inputText" />
</p>

<p>パスワード<br />
<input type="text" name="db_password" class="inputText" /><br />
※パスワードの要件は、半角英大文字／半角英小文字、半角数字を組み合わせた、ユーザ名とは異なる12文字以上の文字列となります。</p></p>

<input type="submit" value="データベースを作成" onClick="return confirm('入力内容は、これでよろしいでしょうか。');" class="inputBtn" id="mySqlBtn" />
</form>

<p class="pt10">※Microsoft SQL Serverのデータベースは1つしか作ることができません。<br />
2つ以上ご利用いただく場合は、お手数ですが、<br />
データベース追加オプションをお申込みください。<br /></p>

<?php require("views/footer.php") ?>
