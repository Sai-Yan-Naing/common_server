<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

?>
<?php require("views/dheader.php") ?>
<!-- Start of Wrapper  -->
    <div class="wrapper">

       <?php require("views/sidebar_menu.php") ?>

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
                                <button class="btn btn-outline-secondary">バックアップを実施</button>
                            </div>
                        </div>
                        <form action="" method="post" id="" class="mt-4">
                            <div class="row">
                                <div class="form-group col-sm-4 mb-2">
                                    <div>バックアップデータ</div>
                                    <div class="date-backup mt-2">バックアップデータ日付</div>
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