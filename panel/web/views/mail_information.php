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
                    	<div class="mt-3 mb-3">ドメイン</div>
                        <div class="mt-3 mb-4">ドメイン移管（他社から弊社に移管）</div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">ドメイン名</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="" name="domain_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 m-t-0">
                                    <div class="form-group">
                                        <label for="">ドメイン種別</label>
                                        <input type="text" class="form-control" id="" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">AuthCode</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="" name="auth_code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-outline-secondary">申請</button>
                            </div>
                        </form>
                        <div class="mt-4 mb-5">ドメイン移管（弊社から他社に移管）</div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">ドメイン名</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="" name="domain_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 m-t-0">
                                    <div class="form-group">
                                        <label for="">ドメイン種別</label>
                                        <input type="text" class="form-control" id="" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-outline-secondary">他社移管申請</button>
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