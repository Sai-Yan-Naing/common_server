<?php 
$domain_userid = $_COOKIE["domain_userid"];
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
<title>【Winserver】 管理画面</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</head>
<body>

<div id="loginWrapper">
	<h1 style="font-size: 20px; font-weight: bold;">Winserver Controlpanel Share server</h1>
<form action="new_pass_confirm.php" method="post" id="new_pass_confirm" />
<p><?php echo $domain_userid; ?></p>
<table>
	<tr>
		<th scope="row">新しいパスワード</th>
		<td><input type="password" name="newpass" id="newpass" size="40" required /></td>
	</tr>

	<tr>
		<th scope="row">新しいパスワード（確認）</th>
		<td><input type="password" name="newpass_con" id="newpass_con" size="40" required /></td>
	</tr>

	<tr>
		<td></td>
		<td><a href="login.php" id="btnBack" class="btn inputBtn">戻る</a><input type="submit" value="パスワードの再設定を行う" id="btnReset"  class="inputBtn" /></td>
	</tr>
</table>
</form>
<!-- /loginWrapper -->
</div>
<script src="js/common.js"></script>
</body>
</html>