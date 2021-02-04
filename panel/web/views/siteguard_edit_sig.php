<?php require("views/header.php"); ?>

<h1 class="captionL">SiteGuard</h1>

<div class='siteGuard'>
	<div style='margin-bottom:1em;'>
		<form action='.\siteguard_manage_sig.php' method='post'>
			URL（正規表現）：
			^
			<select name="protocol" style='width: 75px;margin-right:5px;'>
				<option value="http" <?php if (preg_match("/^\^http:/", trim($sig[6]))) { echo "selected='selected'"; } ?> >http</option>
				<option value="https" <?php if (preg_match("/^\^https:/", trim($sig[6]))) { echo "selected='selected'"; } ?> >https</option>
				<option value="https?" <?php if (preg_match("/^\^https\?:/", trim($sig[6]))) { echo "selected='selected'"; } ?> >https?</option>
			</select>
			://.*<?php echo $domain ?>
			<input name='string' type='text' required value='<?php echo preg_replace("/^\^https?\?*:\/\/\.\*" . $domain . "/", '', trim($sig[6])); ?>' style='height:25px;width:300px;margin-right:5px;' />

			動作：
			<select name="action" style='width: 350px;margin-right:5px;'>
				<option value="1" <?php if (trim($sig[1]) == 'WHITE') { echo "selected='selected'"; } ?> >WHITE：URLへの接続を拒否／監視しない。</option>
				<option value="2" <?php if (trim($sig[1]) == 'MONITOR') { echo "selected='selected'"; } ?> >MONITOR：URLへの接続元のIPアドレスを監視する。</option>
				<option value="3" <?php if (trim($sig[1]) == 'BLOCK') { echo "selected='selected'"; } ?> >BLOCK：URLへの接続を拒否する。</option>
			</select>

			<input name='sig_name' type='hidden' value='<?php echo $sig[3] ?>' />
			<input name='type' type='hidden' value='4' />
			<input type='submit' value='更新' style='margin-left:5px;margin-right:5px;' />
		</form>
	</div>

	<div style='margin-bottom:1em;'>
		<a href='siteguard.php'><button>キャンセル</button></a>
	</div>
</div>

<?php
require("views/footer.php");