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
<h1><img src="../img/login/title.png" width="220" height="90" alt="ウィンサーバー　コントロールパネルログイン"></h1>
<form action="login_confirm.php" method="post" id="login_confirm" />
<table>
	<tr>
		<th scope="row">ご契約ID</th>
		<td><input type="text" name="domain_userid" id="domain_userid" size="40" /></td>
	</tr>
	<tr>
		<th scope="row">PASSWORD</th>
		<td><input type="password" name="password" id="password" size="40" /></td>
	</tr>
	<tr>
		<th colspan="2" scope="row"><input type="submit" value="ログイン" id="btnLogin" class="inputBtn" /></th>
		</tr>
</table>
<div style="margin-top: -30px">
	<a href="pass_reset.php">PASSWORDをお忘れの方はこちらから</a>
</div>
</form>

<!-- /loginWrapper -->
</div>
<script src="js/common.js"></script>
</body>
</html>