
<?php require("views/header.php") ?>
<?php require_once("config/all.php"); ?>

<h1 class="captionL">Microsoft SQL Server追加</h1>

<p>
データベース名：<?php echo $data['db_name']; ?><br />
ユーザー名：<?php echo $data['db_user']; ?><br />
で、データベースをご利用いただいております。
</p>

<p>
また、データベースサーバーは、<?=  $data['host_name'] ?>（IPアドレスは、<?=  $data['host_ip'] ?>）<br>
となっております。
</p>

<?php require("views/footer.php") ?>