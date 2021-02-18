<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

?>
<?php require("views/dheader.php") ?>
<!-- Start of Wrapper  -->
    <div class="wrapper">

        <!--Start of Sidebar  -->
        <nav id="sidebar"  style="margin-top: 85px;">
            <ul class="list-unstyled components">
                <li>
                    <a href="dhome.php">
                        <span class="icon"><i class="fas fa-server"></i></span><br>
                        <span class="title">サーバー設定</span>
                    </a>
                </li>
                <li class="active">
                    <a href="mail_setting.php">
                        <span class="icon"><i class="fas fa-envelope"></i></span><br>
                        <span class="title">ＭＡＩＬ設定</span>
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
        </nav>
        <!--End of Sidebar  -->

        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 80px;">
            <div class="row">
                <div class="col-sm-2">
                    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
                    <div class="icon-align"><span class="text-center"><?php echo $_COOKIE['d']; ?></span></div><br>
                    <div class="icon-align"><span class="text-center">ドメイン</span></div><br>
                    <div class="icon-align"><span class="text-center">ご契約情報</span></div><br>
                    <div class="icon-align"><span class="text-center">ドメイン</span></div><br>
                    <div class="icon-align"><span class="text-center">自動バックアップ</span></div><br>
                </div>
                <div class="col-sm-10">
                    <h6 class="wserver">Winserver Controlpanel Share server</h6>
                    <div class="rcontent">
                    	<div class="mb-3">バックアップ</div>
                    	<div class="row">
                    		<div class="col-sm-3">
                    			<span>自動バックアップ</span>
                    		</div>
                    		<div class="col-sm-9">
                    			<button class="btn btn-primary" type="button">ON | OFF</button>
                    		</div>
                    	</div>
                    	<div class="row mt-3">
                    		<div class="col-sm-3">
                    			<span>自動バックアップ</span>
                    		</div>
                    		<div class="col-sm-5">
                    			<div class="per-backup">バックアップを実施</div>
                    		</div>
                    	</div>
                    	<div class="mt-4 mb-3">バックアップデータ</div>
                    	<form class="form-inline">
							<div class="form-group mb-2">
						    	<input type="text" class="form-control" id="staticEmail2" placeholder="バックアップデータ日付">
						  	</div>
						  	<div class="form-group mx-sm-3">
						    	<button type="submit" class="btn btn-outline-secondary mb-2 mr-3">リストア</button>
						  		<button type="delete" class="btn btn-outline-secondary mb-2">削除</button>
						  	</div>
						</form>
                    </div>
                    
                </div>
            </div>


        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>