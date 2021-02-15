<?php require("views/header.php") ?>
	<div class="main_container">
		<div class="sidebar" style="margin-top: 50px;">        <!-- 85px -->
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
							<span class="icon"><i class="fas fa-id-badge"></i></span><br>
							<span class="title">ご契約情報</span>
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

		<div class="right-content" style="padding-top: 65px;">
			<h5 class="title-cont text-center">Winserver Controlpanel</h5>         <!--  130px -->
			<div class="row">
			    <div class="col-md-2">
			    	<p><b>契約ID</b></p>
			    </div>
			    <div class="col-md-10">
			    	<p class="btn btn-outline-secondary contractId"><?php echo $_COOKIE['d']; ?></p>
			    </div>
			</div>

			<div class="row">
				<div class="col-md-2">
			    	<p><b>契約サービス</b></p>
			    </div>
			    <div class="col-md-10 conService">
			    	<ul class="tab-bar">
						<li class="tabs" id="tab1" onclick="tabOne()">共用サーバー</li>
						<li class="tabs" id="tab2" onclick="tabTwo()">VPS/デスクトッププラン</li>
						<div class="panel" id="share-panel">
							<table class="table table-borderless">
							  <thead>
							    <tr>
							      <th>契約ドメイン</th>
							      <th></th>
							      <th>使用容量</th>
							      <th>サイト</th>
							      <th>アプリケーションプール</th>
							      <th>削除</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <td>a.com</td>
							      <td><a href="dhome.php" class="btn btn-outline-primary btn-sm">設定</a></td>
							      <td><span class="btn btn-outline-secondary btn-sm">〇〇ＧＢ</span></td>
							      <td><span class="btn btn-outline-secondary btn-sm">起動/停止</span></td>
							      <td><span class="btn btn-outline-secondary btn-sm">起動/停止</span></td>
							      <td></td>
							    </tr>
							    <tr>
							      <td>b.com</td>
							      <td><a href="dhome.php" class="btn btn-outline-primary btn-sm">設定</a></td>
							      <td><span class="btn btn-outline-secondary btn-sm">〇〇ＧＢ</span></td>
							      <td><span class="btn btn-outline-secondary btn-sm">起動/停止</span></td>
							      <td><span class="btn btn-outline-secondary btn-sm">起動/停止</span></td>
							      <td><span class="btn btn-outline-secondary btn-sm">削除</span></td>
							    </tr>
							    <tr>
							      <td>c.com</td>
							      <td><a href="dhome.php" class="btn btn-outline-primary btn-sm">設定</a></td>
							      <td><span class="btn btn-outline-secondary btn-sm">〇〇ＧＢ</span></td>
							      <td><span class="btn btn-outline-secondary btn-sm">起動/停止</span></td>
							      <td><span class="btn btn-outline-secondary btn-sm">起動/停止</span></td>
							      <td><span class="btn btn-outline-secondary btn-sm">削除</span></td>
							    </tr>
							  </tbody>
							</table>
							<div class="conButton">
								<a href="add_domain.php" class="domainAdd btn btn-outline-primary btn-sm" role="button">マルチドメイン追加</a>
								<a href="#"  class="domainAcq btn btn-outline-secondary btn-sm">ドメイン取得</a>
								<a href="add_server.php" class="addServer btn btn-outline-primary btn-sm">サーバー追加</a>
							</div>
						</div>
						<div class="panel" id="vps-panel">
							<table class="table table-borderless">
							  <thead>
							    <tr>
							      <th></th>
							      <th></th>
							      <th></th>
							      <th>使用容量</th>
							      <th>サイト</th>
							      <th>アプリケーションプール</th>
							      <th>削除</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<tr>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  	</tr>
							  </tbody>
							</table>
						</div>
					</ul>
			    </div>
			    <!-- <div class="col-md-2"></div> -->
			</div>
			<!-- <div class="row">
				<div class="col-md-2">
					<p><b>契約ドメイン</b></p>
				</div>
				<div class="col-md-10">
					
				</div>
			</div> -->
		</div>
	</div>

			


	<script>
		function get(obj) {
			return document.getElementById(obj);
		}

		function tabOne() {
			get("tab1").style.background = "#f5f5f5";
			get("tab1").style.color = "#039";
			get("tab2").style.background = "#fff";
			get("tab2").style.color = "#000";
			get("share-panel").style.display = "block";
			get("vps-panel").style.display = "none";
		}

		function tabTwo() {
			get("tab1").style.background = "#fff";
			get("tab1").style.color = "#000";
			get("tab2").style.background = "#f5f5f5";
			get("tab2").style.color = "#039";
			get("share-panel").style.display = "none";
			get("vps-panel").style.display = "block";
		}
	</script>
	<?php require("views/footer.php") ?>