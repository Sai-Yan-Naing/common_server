<?php require("views/header.php") ?>

<!-- <h1 class="captionL">ログイン後画面（主契約のドメインでログインした場合）
</h1> -->

<div class="left-menu">
  <a href=""><img src="img/contract/television.png" alt="" width="30" height="30"><span>サーバー管理</span></a>
  <a href=""><img src="img/contract/con-info.png" alt="" width="30" height="30"><span>ご契約情報</span></a>
  <a href=""><img src="img/contract/manual.png" alt="" width="30" height="30"><span>マニュアル</span></a>
</div>

<div class="right-content">
	<h1 class="captionL">Winserver Controlpanel</h1>
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
		    	    		<li>起動/停止</li>
		    	    		<li>起動/停止</li>
		    	    		<li></li>
	    	    		</ul>
	    	    		<ul>
	    	    			<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	    	    			<li>b.com</li>
		    	    		<li>〇〇ＧＢ</li>
		    	    		<li>起動/停止</li>
		    	    		<li>起動/停止</li>
		    	    		<li>削除</li>
	    	    		</ul>
	    	    		<ul>
	    	    			<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	    	    			<li>c.com</li>
		    	    		<li>〇〇ＧＢ</li>
		    	    		<li>起動/停止</li>
		    	    		<li>起動/停止</li>
		    	    		<li>削除</li>
	    	    		</ul>
	    	    	</div>
	    	    	<div class="conButton">
						<a href="add_domain.php" class="domainAdd">マルチドメイン追加</a>
						<a href="#" class="domainAcq">ドメイン取得</a>
						<a href="#" class="addServer">サーバー追加</a>
					</div>
	    	    </div>
	    	    <div class="panel" id="vps-panel">
	    	    	<h1>VPS/Desktop plan</h1>
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


<?php
require("views/footer.php");?>