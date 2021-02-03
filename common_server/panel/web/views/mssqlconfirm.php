
<?php require("views/header.php") ?>
<?php require_once("config/all.php"); ?>

<h1 class="captionL">Microsoft SQL Server追加</h1>

<p>データベースの登録が完了しました。</p>

<p>以下の情報がデータベースに接続するための重要な情報となります。<br />
大切に保管していただけますようお願い申し上げます。</p>

<p>
接続先サーバー：<?= constant("SQLSERVER_" . $_POST["version"] . "_HOST_NAME") ?><br />
データベース名:<?= $_POST["db"] ?><br />
ユーザー名:<?= $_POST["db_user"] ?><br />
パスワード:<?= $_POST["db_password"]?>
</p>

<?php require("footer.php") ?>
