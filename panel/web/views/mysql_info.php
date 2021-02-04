
<?php require("views/header.php") ?>

<h1 class="captionL">MySQL追加</h1>

<p>
データベース名：<?php echo $data['db_name']; ?><br />
ユーザー名：<?php echo $data['db_user']; ?><br />
で、データベースをご利用いただいております。
</p>

<p>
また、データベースサーバーは、mysql3.winserver.ne.jp（IPアドレスは、203.137.92.5）<br>
となっております。<br />
<a href="http://mysql3.winserver.ne.jp:8778/" target="_blank">phpmyadminへ</a>
</p>

<?php require("views/footer.php") ?>
