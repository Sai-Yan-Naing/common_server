<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Winserver Controlpanel</title>
	<link rel="stylesheet" type="text/css" href="css/contract.css">
	<link rel="stylesheet" href="css/sidebar.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>

	<div class="main_container">
		<div class="sidebar">
			<div class="sidebar__inner">

				<ul>
					<li>
						<a href="#" class="active">
							<span class="icon"><i class="fas fa-tv"></i></span><br>
							<span class="title">サーバー管理</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="icon"><i class="fas fa-cog"></i></span><br>
							<span class="title">各種設定</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="icon"><i class="fas fa-file-alt"></i></span><br>
							<span class="title">マニュアル</span>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="right-content">
			<h1>Winserver Controlpanel Share server</h1>

			<ul class="txtImg">
				<li class="left-wrap">
					<img src="img/contract/server.png" alt="" width="50" height="50">
					<span>契約ID</span>
					<span>D0000000</span>
				</li>
				<li class="right-wrap"><span>
						<form action="" method="get" accept-charset="utf-8">
							<h2><b>マルチドメイン追加</b></h2>

							<div class="form-group">
								<label for="" class="domain">ドメイン名</label>
								<input type="text" name="domain" placeholder="ドメイン名">
							</div>

							<div class="form-group">
								<label for="" class="document">ドキュメントルート</label>
								<input type="text" name="document" placeholder="">
							</div>

							<div class="form-group">
								<label for="" class="ftp">FTPユーザー名</label>
								<input type="text" name="ftp" placeholder="">
							</div>

							<div class="form-group">
								<label for="" class="password">パスワード</label>
								<input type="text" name="ftp" placeholder="パスワード">
							</div>

							<div class="addButton">
								<input type="submit" name="add" value="追加">
								<a href="main_contract.php" class="cancel">戻る</a>
							</div>
						</form>

					</span></li>
			</ul>
		</div>
	</div>
</body>

</html>