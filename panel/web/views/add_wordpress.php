<?php require("views/header.php"); ?>

<h1 class="captionL">簡単インストール</h1>

<p>
Wordpressの自動インストールには、5分程度かかります。<br />
5分経過しても、Wordpressが設定されていない場合は、<br />
お手数ですが、<a href="mailto:support@winserver.ne.jp">こちら</a>までご連絡ください。
</p>

<p>
Wordpressのトップページは、以下のページになります。<br />
<?php if (strcmp($_POST['dir'], "") !== 0) :?>
<a href="http://<?php echo $domain; ?>/<?php echo $_POST['dir'] ?>">http://<?php echo $domain; ?>/<?php echo $_POST['dir'] ?></a>
<?php else :?>
<a href="http://<?php echo $domain; ?>/">http://<?php echo $domain; ?>/</a>
<?php endif;?>
</p>

<?php require("views/footer.php"); ?>
