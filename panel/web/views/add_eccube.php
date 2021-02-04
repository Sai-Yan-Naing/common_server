<?php require("views/header.php"); ?>

<h1 class="captionL">簡単インストール</h1>

<p>
EC-CUBEの自動インストールには、5分程度かかります。<br />
5分経過しても、EC-CUBEが設定されていない場合は、<br />
お手数ですが、<a href="mailto:support@winserver.ne.jp">こちら</a>までご連絡ください。
</p>

<p>
EC-CUBEのトップページは、以下のページとなります。<br />
<?php if (strcmp($_POST['dir'], "") !== 0) :?>
<a href="http://<?php echo $domain; ?>/<?php echo $_POST['dir']; ?>/html">http://<?php echo $domain; ?>/<?php echo $_POST['dir']; ?>/html</a>
<?php else :?>
<a href="http://<?php echo $domain; ?>/html">http://<?php echo $domain; ?>/html</a>
<?php endif;?>
</p>

<?php require("views/footer.php"); ?>
