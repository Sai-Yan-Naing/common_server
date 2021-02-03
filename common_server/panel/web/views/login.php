<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
<title>【Winserver】 管理画面</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<div id="loginWrapper">
<h1><img src="../img/login/title.png" width="220" height="90" alt="ウィンサーバー　コントロールパネルログイン"></h1>
<form action="login_confirm.php" method="post" />
<table>
	<tr>
		<th scope="row">ご契約ID</th>
		<td><input type="text" name="domain_userid" size="40" /></td>
	</tr>
	<tr>
		<th scope="row">PASSWORD</th>
		<td><input type="password" name="password" size="40" /></td>
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
</body>
</html>