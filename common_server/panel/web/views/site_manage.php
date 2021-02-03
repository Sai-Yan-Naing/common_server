<?php require("views/header.php") ?>


<h1 class="captionL">サイトの管理</h1>

<?php if($site == 0) : ?>
<p class="notice">サイトを起動しました。</p>
<?php elseif($site == 1) : ?>
<p class="notice">サイトを停止しました。</p>
<?php endif; ?>

<p class="mb20">サイトは現在「<span class="attention">
<?php
	$str = exec("C:\\Windows\\System32\\inetsrv\\appcmd.exe list site /site.name:". $user);
	if (strpos($str, "state:Started") != FALSE) {
		echo "起動中";
	} else {
		echo "停止中";
	}
?>
&nbsp;</span>」です。</p>

<div id="siteManage">
<form action="site_on_confirm.php" method="post" />
<input type="submit" value="サイト起動" class="inputBtn" /><br>
</form>
<form action="site_off_confirm.php" method="post" />
<input type="submit" value="サイト停止" class="inputBtn" /><br>
</form>
</div>

<?php require("views/footer.php") ?>