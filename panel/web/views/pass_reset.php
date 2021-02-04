<?php

session_start();
$token = md5(uniqid(rand(), TRUE));

?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
<title>【Winserver】 管理画面</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div id="loginWrapper">
	<h1 style="font-size: 20px; font-weight: bold;">Winserver Controlpanel Share server</h1>
<form action="pass_reset_confirm.php" method="post" />
<input type="hidden" name="token_" value="<?php echo $token ;?>">
<table>
	<tr>
		<th scope="row">ユーザーID or ドメイン名</th>
		<td><input type="text" name="domain_userid" size="40" required /></td>
	</tr>
	<tr>
		<td></td>
		<td><a href="login.php" id="btnBack" class="btn inputBtn">戻る</a><input type="submit" value="パスワードの再設定手続きを行う" id="btnReset"  class="inputBtn" /></td>
	</tr>
</table>
</form>
<div style="margin-top: -30px">
	再発行ボタンをクリックいただくと、ご登録いただいているお客様情報のメールアドレスにパスワード再設定の認証メールを送付いたしますので、メールをご確認の上手続きをお願いいたします。
</div>
<!-- /loginWrapper -->
</div>
</body>
</html>