<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

?>
<?php require("views/dheader.php") ?>
<!-- Start of Wrapper  -->
    <div class="wrapper">

        <!--Start of Sidebar  -->
        <nav id="sidebar"  style="margin-top: 95px;">
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
        <div id="content" class="dhome"  style="margin-top: 87px;">
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
                                <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm">
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
                        <!-- <div class="mt-4 mb-3">バックアップデータ</div> -->
                        <form action="" method="post" id="">
                            <div class="row">
                                <div class="form-group col-sm-4 mb-2">
                                    <label for="backup">バックアップデータ</label>
                                    <input type="text" class="form-control" id="backup" name="" placeholder="バックアップデータ日付">
                                </div>
                                <div class="form-group col-sm-6 mt-04">
                                    <button type="submit" class="btn btn-outline-secondary mb-2 mr-3">リストア</button>
                                    <button type="delete" class="btn btn-outline-secondary mb-2">削除</button>
                                </div>
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