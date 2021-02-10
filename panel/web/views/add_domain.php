<?php require("views/header.php") ?>

	<div class="main_container">
		<div class="sidebar" style="margin-top: 85px;">
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

			<div class="row" style="margin-top: 130px;">
				<div class="col-md-2 mr-t">
					<p><i class="fas fa-tv"></i></p>
					<p>契約ID</p>
					<p><?php echo $_COOKIE['d']; ?></p>
				</div>
				<div class="col-md-10">
					<h5 class="title-cp">Winserver Controlpanel Share server</h5>
					<p class="btn btn-outline-secondary">マルチドメイン追加</p>

					<form action="" method="post" id="registration">

					  <div class="form-group row">
					    <label for="" class="col-sm-2 col-form-label">ドメイン名</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" name="domain" id="domain" value="" placeholder="ドメイン名">
					    </div>
					    <div class="col-sm-3"></div>
					  </div>

					  <div class="form-group row">
					    <label for="" class="col-sm-2 form-label">ドキュメントルート</label>
					    <div class="col-sm-7">
					    	<div class="row">
					    		<div class="col-sm-5">
					      			<input type="text" name="" readonly class="form-control-plaintext" id="" value="Domainのドキュメントルートを表示/">
					    		</div>
					    		<div class="col-sm-7">
					      			<input type="text" class="form-control" name="document" id="document" placeholder="8～20文字、半角英数字記号">
					    		</div>
					    	</div> 
					    </div>
					    <div class="col-sm-2"></div>
					  </div>

					  <div class="form-group row">
					    <label for="" class="col-sm-2 col-form-label">FTPユーザー名</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" name="ftp-user" id="ftp-user" placeholder="1～255文字、半角英数小文字と_-.@">
					    </div>
					    <div class="col-sm-3"></div>
					  </div>

					  <div class="form-group row">
					    <label for="" class="col-sm-2 col-form-label">パスワード</label>
					    <div class="col-sm-7">
					      <input type="password" class="form-control" name="password" id="password" placeholder="8～70文字、半角英数字記号">
					    </div>
					    <div class="col-sm-3"></div>
					  </div>

					  <div class="form-group row">
					    <div class="col-sm-2"></div>
					    <div class="col-sm-7 ddButton">
					      	<input type="submit" name="add" class="btn btn-outline-primary btn-sm p-tb-lr text-justify" value="追加">
						 	<a href="home.php" class="btn btn-outline-primary btn-sm p-tb-lr text-justify">戻る</a>
					    </div>
					    <div class="col-sm-3"></div>
					  </div>

					</form>
				</div>			
			</div>
		</div>
	</div>
<?php require("views/footer.php") ?>