<?php 
session_start(); 
$token = $_SESSION['token'];
$domain_userid = $_SESSION['domain_userid'];
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
<?php if(isset($_GET['token']) and $token==$_GET['token']){ ?>
<form action="login_confirm.php" method="post" />
<p><?php echo $domain_userid; ?></p>
<table>
	<tr>
		<th scope="row">新しいパスワード</th>
		<td><input type="text" name="newpass" size="40" required /></td>
	</tr>

	<tr>
		<th scope="row">新しいパスワード（確認）</th>
		<td><input type="text" name="newpass_con" size="40" required /></td>
	</tr>

	<tr>
		<td></td>
		<td><a href="login.php" id="btnBack" class="btn inputBtn">戻る</a><input type="submit" value="パスワードの再設定を行う" id="btnReset"  class="inputBtn" /></td>
	</tr>
</table>
</form>
<?php } ?>
<!-- /loginWrapper -->
</div>
</body>
</html>