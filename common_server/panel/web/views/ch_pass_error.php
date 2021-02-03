
<?php require("views/header.php") ?>

<h1 class="captionL">パスワード変更</h1>

<p class="attention">※入力内容に誤りがあります</p>
<p class="attention">新しいパスワード欄が空欄でないか等、ご確認いただけますようお願い申し上げます。</p>

<form action="ch_pass_confirm.php" method="post" />
<p>
変更前のパスワードを入力してください<br />
<input type="password" name="password_old" class="inputText" />
</p>
<p>
新しいパスワードを入力してください<br />
<input type="password" name="password" class="inputText" />
</p>
<p>
もう一度入力してください<br />
<input type="password" name="password_comp" class="inputText" />
</p>
<p>
<input type="submit" value="パスワードを変更する" class="inputBtn" id="siteCangeBtn" />
</p>
</form>
<p class="attention">
※FTPパスワードの変更の反映には、5分程度かかります。<br />
5分経過しても、パスワードが変更されない場合は、<br />
お手数ですが、<a href="mailto:support@winserver.ne.jp">こちら</a>までご連絡ください。
</p>
<?php require("footer.php") ?>