<?php require("views/header.php") ?>

<h1 class="captionL">アプリケーションの管理</h1>

<?php if ($is_ver == 1) : ?>
<p class="notice">.NET Frameworkのバージョンを変更しました。</p>
<?php endif; ?>
<?php if ($is_app == 1) : ?>
<p class="notice">アプリケーションプールを起動しました。</p>
<?php elseif ($is_app == 2) : ?>
<p class="notice">アプリケーションプールを停止しました。</p>
<?php elseif ($is_app == 3) : ?>
<p class="notice">アプリケーションプールをリサイクルしました。</p>
<?php elseif ($is_app == 4) : ?>
<p class="notice">アプリケーションを追加しました。</p>
<?php elseif ($is_app == 5) : ?>
<p class="notice">アプリケーションを削除しました。</p>
<?php endif; ?>

<p>
	<?php
	$v2 = "";
	$v4 = "";
	if (strpos($app_ver, "MgdVersion:v4.0")) {
		echo ".NET Frameworkのバージョンは<span class='attention'>&nbsp;4.0 / 4.5&nbsp;</span>です。";
		$v4 = "selected";
	} elseif(strpos($app_ver, "MgdVersion:v2.0")) {
		echo ".NET Frameworkのバージョンは<span class='attention'>&nbsp;2.0 / 3.5&nbsp;</span>です。";
		$v2 = "selected";
	} else {
		echo "Application pool error";
	}
?>
</p>
<form action="change_appver.php" method="post" />

<select name="v">
	<option value="v2.0" <?php echo $v2; ?> />
	
	.Net Framework 2.0 / 3.5
	
	</option>
	<option value="v4.0" <?php echo $v4; ?> />
	
	.Net Framework 4.0 / 4.5
	
	</option>
</select>
<input type="submit" value="バージョン変更" class="inputBtn" />
</form>

<p>現在、アプリケーションプールは<font color="#FF0000">
	<?php
	$v2 = "";
	$v4 = "";
	if (strpos($app_ver, "Stopped")) {
		echo "停止中";
		$v4 = "";
	} elseif(strpos($app_ver, "Started")) {
		echo "起動中";
		$v2 = "selected";
	} else {
		echo "何らかのエラー状態";
	}
?>
	</font> です。</p>
<table id="appPool">
	<tr>
		<td><form action="app_stop.php" method="post" />
			
			<input type="submit" value="アプリケーションプールを停止する" class="inputBtn" />
			</form></td>
		<td><form action="app_start.php" method="post" />
			
			<input type="submit" value="アプリケーションプールを起動する" class="inputBtn" />
			</form></td>
		<td><form action="app_recycle.php" method="post" />
			
			<input type="submit" value="アプリケーションプールをリサイクルする" class="inputBtn" />
			</form></td>
	</tr>
</table>
<p> 特定のディレクトリ下でASP.NETのアプリケーションを利用するには、<br />
	アプリケーションプールに仮想ディレクトリを追加する必要がございます。<br />
	アプリケーションの追加と削除は、ディレクトリを指定して実施してください。 </p>


<?php if(!empty($app_list)) :?>
<table class="appListTable">
	<caption>登録済アプリケーション一覧</caption>
		<?php foreach ($app_list as $app_row) : ?>
	<tr>
		<th><?php echo $app_row; ?></th>
		<td><form action="app_remove.php" method="post" />
			
			<input type="hidden" name="current" value="<?php echo $sub_dir; ?>" />
			<input type="hidden" name="path" value="<?php echo $app_row; ?>" />
			<input type="submit" value="アプリケーション削除" class="inputBtn" />
			</form></td>
	</tr>
		<?php endforeach; ?>
</table>

<?php endif; ?>
<?php
	$sub_dir = str_replace("\\", '/', $sub_dir);
	$prev_length = strrpos($sub_dir, '/');
	$prev_dir = substr($sub_dir, 0, $prev_length);
	if (strcmp($sub_dir, "") == 0) {
		$current_dir = "ディレクトリ一覧";
	} else {
		$current_dir = '' . $sub_dir . ' 以下のディレクトリ一覧';
	}
?>

<table class="appListTable">
	<caption><?php echo $current_dir; ?></caption>
	<tr>
		<th colspan="2"><a href="app_list.php">ルートディレクトリに戻る</a></th>
	</tr>
	<tr>
		<th colspan="2"><a href="app_list.php?sub_dir=<?php echo urlencode($prev_dir); ?>">▲1つ上のディレクトリに戻る</a></th>
	</tr>
	<?php foreach ($dir_list as $dir_row) : ?>
	<tr>
		<th><?php
	$rep = "E:\\webroot\\LocalUser\\$user\\web";
	
	$dir_l = str_replace($rep,"", $dir_row);
	$dir_l = str_replace("\\", '/', $dir_l);
	$dir_l = $sub_dir . '/' . $dir_l;

?>
			<a href="app_list.php?sub_dir=<?php echo urlencode($dir_l); ?>" /><?php echo $dir_l; ?></a></th>
		<td><form action="app_add.php" method="post" />
			
			<input type="hidden" name="current" value="<?php echo $sub_dir; ?>" />
			<input type="hidden" name="path" value="<?php echo $dir_l; ?>" />
			<input type="submit" value="アプリケーション追加" class="inputBtn" />
			</form></td>
	<tr>
		<?php endforeach; ?>
</table>
<?php require("views/footer.php") ?>
