<?php require("views/header.php") ?>

<!-- <h3>Multi Domain Adding</h3> -->

<div class="left-menu">
  <a href=""><img src="img/contract/television.png" alt="" width="30" height="30"><span>サーバー管理</span></a>
  <a href=""><img src="img/contract/setting.png" alt="" width="30" height="30"><span>各種設定</span></a>
  <a href=""><img src="img/contract/manual.png" alt="" width="30" height="30"><span>マニュアル</span></a>
</div>

<div class="right-content">
	<h1 class="captionL">Winserver Controlpanel Share server</h1>

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
		    		<label for="">ドメイン名</label>
		    		<input type="text" name="domain" placeholder="ドメイン名">
		    	</div>

		    	<div class="form-group">
			    	<label for="">ドキュメントルート</label>
			    	<input type="text" name="document" placeholder="">
		    	</div>

		    	<div class="form-group">
			    	<label for="">FTPユーザー名</label>
			    	<input type="text" name="ftp" placeholder="">
		    	</div>

		    	<div class="form-group">
			    	<label for="">パスワード</label>
			    	<input type="text" name="ftp" placeholder="パスワード">
			    </div>

		    	<div class="addButton">
		    		<input type="submit" name="add" value="追加">
					<a href="#" class="cancel">戻る</a>
		    	</div>
	    	</form>

	    </span></li>
	</ul>
	
	
</div>

<?php
require("views/footer.php");?>