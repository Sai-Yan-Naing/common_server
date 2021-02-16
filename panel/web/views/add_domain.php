<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

?>
<?php require("views/header.php") ?>
<!-- Start of Wrapper  -->
    <div class="wrapper">

        <!--Start of Sidebar  -->
        <nav id="sidebar"  style="margin-top: 85px;">
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#">
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
        </nav>
        <!--End of Sidebar  -->

        <!-- Start of Page Content  -->
        <div id="content" class="home"  style="margin-top: 80px;">
            <div class="row">
                <div class="col-sm-2">
                    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
                    <div class="icon-align"><span class="text-center">契約ID</span></div><br>
                    <div class="icon-align"><span class="text-center"><?php echo $_COOKIE['d']; ?></span></div><br>
                    
                </div>
                <div class="col-sm-10">
                	<div class="row">
                		<div class="col-sm-1"></div>
                    		<div class="col-sm-11"><h6 class="wshare-server">Winserver Controlpanel Share server</h6></div>
                	</div>
                    
                    <button type="submit" class="btn btn-outline-secondary add-multi">マルチドメイン追加</button>

                    <form action="" method="post" id="user-home" class="form-content"/>
                        <div class="form-group row">
                            <label for="domain" class="col-sm-3 col-form-label">ドメイン名</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="domain" name="domain" placeholder="ドメイン名">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="document" class="col-sm-3 col-form-label">ドキュメントルート</label>
                            <div class="col-sm-3">
                            	<input type="text" name="document" readonly class="form-control-plaintext" id="doc-root" value="Domainのドキュメントルートを表示/">
                        	</div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="document" name="document" placeholder="8～20文字、半角英数字記号">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ftp_user" class="col-sm-3 col-form-label">FTPユーザー名</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ftp-user" name="ftp_user" placeholder="1～255文字、半角英数小文字と_-.@">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">パスワード</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="passwordpassword" name="password" placeholder="8～70文字、半角英数字記号">
                            </div>
                        </div>

                        <div class="row form-group">
						    <div class="col-sm-3"></div>
						    <div class="col-sm-8 ddButton">
						      	<input type="submit" name="add" class="btn btn-outline-primary btn-sm p-tb-lr text-justify" value="追加">
							 	<a href="home.php" class="btn btn-outline-primary btn-sm p-tb-lr text-justify">戻る</a>
						    </div>
					  	</div>
                    </form>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>