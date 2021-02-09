<?php require("views/header.php") ?>
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

		<div class="right-content">
			<h1>Winserver Controlpanel</h1>
			<ul class="conId">
				<li><b>契約ID</b></li>
				<li><span>D0000000</span></li>
			</ul>
			<ul class="conService">
				<li><b>契約サービス</b></li>
				<li><span>
						<ul class="tab-bar">
							<li class="tabs" id="tab1" onclick="tabOne()">共用サーバー</li>
							<li class="tabs" id="tab2" onclick="tabTwo()">VPS/デスクトッププラン</li>
							<div class="panel" id="share-panel">
								<!-- <h1>Share Server</h1> -->
								<ul class="title-list">
									<li></li>
									<li></li>
									<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
									<li><b>使用容量</b></li>
									<li><b>サイト</b></li>
									<li><b>アプリケーションプール</b></li>
									<li><b>削除</b></li>
								</ul>
								<div class="conDomain">
									<ul>
										<li>契約ドメイン</li>
										<li>a.com</li>
										<li>〇〇ＧＢ</li>
										<!-- <li class="start-stop">
		    	    			<span class="start">起動</span>
		    	    			<span class="stop">停止</span>
		    	    		</li> -->
										<li>起動/停止</li>
										<li>起動/停止</li>
										<li></li>
									</ul>
									<ul>
										<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
										<li>b.com</li>
										<li>〇〇ＧＢ</li>
										<li>起動/停止</li>
										<li>起動/停止</li>
										<li>削除</li>
									</ul>
									<ul>
										<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
										<li>c.com</li>
										<li>〇〇ＧＢ</li>
										<li>起動/停止</li>
										<li>起動/停止</li>
										<li>削除</li>
									</ul>
								</div>
								<div class="conButton">
									<a href="add_domain.php" class="domainAdd">マルチドメイン追加</a>
						<a href="#"  class="domainAcq" data-toggle="modal" data-target="#myModal">ドメイン取得</a>
									<a href="#" class="addServer">サーバー追加</a>
								</div>
							</div>
							<div class="panel" id="vps-panel">
								<h3>VPS/Desktop plan</h3>
								<ul class="title-list">
									<li></li>
									<li></li>
									<li></li>
									<li><b>使用容量</b></li>
									<li><b>サイト</b></li>
									<li><b>アプリケーションプール</b></li>
									<li><b>削除</b></li>
								</ul>
							</div>
						</ul>
					</span></li>
			</ul>

		</div>
	</div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Domain Checker</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="form-inline">
		    <input class="form-control mr-sm-2" type="text" id="domainval" placeholder="Search">
		    <button class="btn btn-success" id="domainsearch" type="button">Check</button>
		</form>
		<div id="result_domain"></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
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

	<div id="footer">
		<p>copyrightc Japan System Development co.,Ltd All rights reserved.</p>
	</div>
	<script src="js/searchdomain.js"></script>
</body>

</html>