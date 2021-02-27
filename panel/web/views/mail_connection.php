<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

?>
<?php require("views/dheader.php") ?>
<!-- Start of Wrapper  -->
    <div class="wrapper">

        <?php require("views/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="mail_connection"  style="margin-top: 87px;">
            <div class="row">
                <div class="col-sm-2">
                    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
                    <div class="icon-align"><span class="text-center"><?php echo $_COOKIE['d']; ?></span></div><br>
                    <div class="m-40"><span>ドメイン</span></div><br>
                    <div class="m-40"><a href="#"><span>メール設定</span></a></div><br>
                    <div class="m-40"><a href="mail_connection.php"><span >メール接続情報</span></a></div><br>
                    <div class="m-40"><a href="#"><span>WEBメール</span></a></div><br>
                </div>
                <div class="col-sm-10">
                    <h6 class="wserver">Winserver Controlpanel Share server</h6>
                    <div class="connec-tabs">
                        <div class="text-label-align">
                            メール接続情報
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item nav-border">
                                <a class="nav-link active" data-toggle="tab" href="#pop-imap">ＰＯＰ/ＩＭＡＰ</a>
                            </li>
                            <li class="nav-item nav-border">
                                <a class="nav-link" data-toggle="tab" href="#smtp">ＳＭＴＰ</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="pop-imap" class="container tab-pane active"><br>
                                <form action="" method="post" id="" />
                                    <div class="form-group row">
                                        <label for="cserver-name" class="col-sm-3 col-form-label">接続サーバー名</label>
                                        <div class="col-sm-8">
                                        <span class="col-form-label"> Mail.domeinname </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="con-port" class="col-sm-3 col-form-label">接続ポート</label>
                                        <div class="col-sm-8">
                                            <span class="col-form-label"> 587 </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="protect-method" class="col-sm-3 col-form-label">接続保護方法</label>
                                        <div class="col-sm-8">
                                            <span class="col-form-label"> 接続の保護なし </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="authen-method" class="col-sm-3 col-form-label">認証方式</label>
                                        <div class="col-sm-8">
                                            <span class="col-form-label"> 通常のパスワード認証 </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <span class="border border-secondary notice-msg">
                                                弊社ではＩＭＡＰでの接続を推奨しておりません。メールサーバー側にメールデータが溜まることによりメール確認に時間がかかることがあります。ＰＯＰ接続いただくことで、スムーズなメールの送受信が可能です。
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <span class="border border-secondary notice-msg">
                                            メールクライアントの設定によりメールサーバーにメールデータが溜まることでメール容量が一杯になりメール受信ができなくなることがありますので、メールクライアントの設定で、「サーバーを残す」設定にしていただいた場合は、期限を設定するなどを行って頂き、メール容量を管理してください。
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <span class="border border-danger text-danger notice-msg">容量がオーバーした場合はＷＥＢメールにてログインいただき、不要なメールの削除を行ってください。</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="smtp" class="container tab-pane fade"><br>
                                <form action="" method="post" id="" />
                                    <div class="form-group row">
                                        <label for="cserver-name" class="col-sm-3 col-form-label">接続サーバー名</label>
                                        <div class="col-sm-8">
                                        <span class="col-form-label"> Mail.domeinname </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="con-port" class="col-sm-3 col-form-label">接続ポート</label>
                                        <div class="col-sm-8">
                                            <span class="col-form-label"> 587 </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="protect-method" class="col-sm-3 col-form-label">接続保護方法</label>
                                        <div class="col-sm-8">
                                            <span class="col-form-label"> 接続の保護なし </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="authen-method" class="col-sm-3 col-form-label">認証方式</label>
                                        <div class="col-sm-8">
                                            <span class="col-form-label"> 通常のパスワード認証 </span>
                                        </div>
                                    </div>
                                </form>
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