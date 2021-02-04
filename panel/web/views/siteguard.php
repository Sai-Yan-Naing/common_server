<?php require("views/header.php"); ?>

<h1 class="captionL">SiteGuard</h1>

<div class='siteGuard'>
	<div style='margin-bottom:1em;'>
		<form action='.\siteguard_download_log.php' method='post' style='display:inline;margin-right:5px;'>
			検出ログ：
			<input name='log_type' type='hidden' value='1' />
			<input type='submit' value='ダウンロード' />
		</form>

		<form action='.\siteguard_download_log.php' method='post' style='display:contents;'>
			フォームログ：
			<input name='log_type' type='hidden' value='2' />
			<input type='submit' value='ダウンロード' />
		</form>
	</div>

	<div style='margin-bottom:1em;'>
		<form action='.\siteguard_manage_sig.php' method='post'>
			URL（正規表現）：
			<select name="protocol" style='width: 75px;margin-right:5px;'>
				<option value="http">http</option>
				<option value="https">https</option>
				<option value="https?">https?</option>
			</select>
			://.*<?php echo $domain; ?>
			<input name='string' type='text' required placeholder='/.+.php$' style='height:25px;width:300px;margin-right:5px;' />
			
			動作：
			<select name="action" style='width: 350px;margin-right:5px;'>
				<option value="1">WHITE：URLへの接続を拒否／監視しない。</option>
				<option value="2">MONITOR：URLへの接続元のIPアドレスを監視する。</option>
				<option value="3">BLOCK：URLへの接続を拒否する。</option>
			</select>

			<input name='type' type='hidden' value='1' />
			<input type='submit' value='追加' style='margin-left:5px;' />
		</form>
	</div>

	<div>
		<table>
			<tr>
				<th>STATUS</th>
				<th>URL</th>
				<th>動作</th>
				<th>操作</th>
			</tr>

<?php
foreach ($sigs as $sig) {
	if ($sig[0] == 'OFF') {
?>
			<tr style='background:gray;'>
<?php
	} else {
?>
			<tr>
<?php
	}
	
	if ($sig[0] == 'ON') {
?>
				<td style='color:green;font-weight:bold;'>ON</td>
<?php
	} else if ($sig[0] == 'OFF') {
?>
				<td style='color:white;font-weight:bold;'>OFF</td>
<?php
	}
?>
				<td style="text-align:left;"><?php echo trim($sig[6]) ?></td>
				<td><?php echo trim($sig[1]) ?></td>
				<td>
					<form action='.\siteguard_manage_sig.php' method='post' style='display:inline;'>
						<input name='type' type='hidden' value='2' />
						<input name='sig_name' type='hidden' value='<?php echo $sig[3] ?>' />
<?php
	if ($sig[0] == 'ON') {
?>
						<input type='submit' value='無効' />
<?php
	} else if ($sig[0] == 'OFF') {
?>
						<input type='submit' value='有効' />
<?php
	}
?>
					</form>

					<form action='.\siteguard_manage_sig.php' method='post' style='display:contents;'>
						<input name='type' type='hidden' value='3' />
						<input name='sig_name' type='hidden' value='<?php echo $sig[3] ?>' />
						<input type='submit' value='編集' />
					</form>

					<form action='.\siteguard_manage_sig.php' method='post' style='display:contents;'>
						<input name='type' type='hidden' value='5' />
						<input name='sig_name' type='hidden' value='<?php echo $sig[3] ?>' />
						<input type='submit' value='削除' />
					</form>
				</td>
			</tr>
<?php
}
?>
		</table>
	</div>
</div>

<?php
require("views/footer.php");