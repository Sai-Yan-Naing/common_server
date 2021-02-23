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
                                                <div class="form-group">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-primary active">
                                                            <input type="radio" name="options" id="option1" autocomplete="off" checked> 個別入力
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" name="options" id="option2" autocomplete="off"> CSV
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="e_mail">メールアドレス</label>
                                                <input type="email" class="form-control" id="e_mail" name="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 sign-domain">＠ドメイン名</div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="pass_word">パスワード</label>
                                                <input type="password" class="form-control" name="password" id="pass_word" placeholder="8～70文字、半角英数記号の組み合わせ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="reset" class="btn btn-outline-secondary">キャンセル</button>
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
                            <label for="douser" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7">
                              <input type="text" readonly class="form-control" id="douser" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <a href="" class="pr-2"><i class="fas fa-pencil-alt"></i></a>
                                <a href=""><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="douser2" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7">
                              <input type="text" readonly class="form-control" id="douser2" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <a href="" class="pr-2"><i class="fas fa-pencil-alt"></i></a>
                                <a href=""><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="douser3" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7">
                              <input type="text" readonly class="form-control" id="douser3" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <a href="" class="pr-2"><i class="fas fa-pencil-alt"></i></a>
                                <a href=""><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="douser4" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7"> 
                              <input type="text" readonly class="form-control" id="douser4" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <a href="" class="pr-2"><i class="fas fa-pencil-alt"></i></a>
                                <a href=""><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <div class="btn btn-outline-danger mt-3 mb-3">
                            WEBメールより追加いただいたメールアカウント、パスワードについては表示ができませんので予めご了承ください。​
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>