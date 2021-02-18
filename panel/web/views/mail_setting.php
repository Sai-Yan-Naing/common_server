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
                    <div class="icon-align"><span class="text-center">メール設定</span></div><br>
                    <div class="icon-align"><span class="text-center"><a href="mail_information.php">メール接続情報</a></span></div><br>
                    <div class="icon-align"><span class="text-center">WEBメール</span></div><br>
                    <div class="icon-align"><span class="text-center">メーリングリスト</span></div><br>
                </div>
                <div class="col-sm-10">
                    <h6 class="wserver">Winserver Controlpanel Share server</h6>
                    <div class="rcontent">
                    	<div class="row">
                            <div class="col-sm-3">
                                <span>メールアドレス</span>
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapseDirectory" aria-expanded="false" aria-controls="collapseDirectory"><span class="add-db-icon"><i class="fas fa-plus"></i></span>メールアドレス追加</button>
                            </div>
                        </div>
                        <div class="collapse" id="collapseDirectory">
                            <div class="wrap" style="overflow: hidden;">
                                <form action="" method="post" id="mailSetting">
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <button class="btn btn-primary">個別入力</button>
                                                <button class="btn btn-primary">CSV</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                        	<div class="form-group">
											    <label for="">メールアドレス</label>
											    <input type="email" class="form-control" id="" name="email">
											</div>
                                        </div>
                                        <div class="col-sm-2 sign-domain">＠ドメイン名</div>
                                        <div class="col-sm-6">
                                        	<div class="form-group">
											    <label for="">パスワード</label>
											    <input type="password" class="form-control" name="password" id="" placeholder="8～70文字、半角英数記号の組み合わせ">
											</div>
                                        </div>
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="cancel" class="btn btn-outline-secondary">キャンセル</button>
                                        <button type="submit" class="btn btn-outline-secondary">作成</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                        	<div class="col-sm-3">
                        		<span>登録メールアドレス</span>
                        	</div>
                        	<div class="col-sm-9">
                        		<span>パスワード</span>
                        	</div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>


        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>