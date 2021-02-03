
<?php require("views/header.php") ?>

<h1 class="captionL">MySQL追加</h1>

<p>データベースの登録が完了しました。</p>

<p>以下の情報がデータベースに接続するための重要な情報となります。<br />
大切に保管していただけますようお願い申し上げます。</p>

<p>
接続先サーバー：mysql3.winserver.ne.jp<br />
データベース名:<?= $_POST["db"] ?><br />
ユーザー名:<?= $_POST["db_user"] ?><br />
パスワード:<?= $_POST["db_password"]?>
</p>

<p><a href="http://mysql3.winserver.ne.jp:8778/" target="_blank">phpmyadminへ</a></p>

<?php require("footer.php") ?>
