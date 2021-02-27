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
                                                        <label class="btn btn-outline-primary active">
                                                            <input type="radio" name="options" id="option1" autocomplete="off" checked> 個別入力
                                                        </label>
                                                        <label class="btn btn-outline-primary">
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
                                        <button type="reset" class="btn btn-outline-secondary" data-toggle="collapse" data-target="#collapseDirectory">キャンセル</button>
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
                                <a href="javascript:;" class="pr-2" data-toggle="modal" data-target="#passwordModal"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:;" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="douser2" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7">
                              <input type="text" readonly class="form-control" id="douser2" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <a href="javascript:;" class="pr-2" data-toggle="modal" data-target="#passwordModal"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:;" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="douser3" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7">
                              <input type="text" readonly class="form-control" id="douser3" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <a href="javascript:;" class="pr-2" data-toggle="modal" data-target="#passwordModal"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:;" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="douser4" class="col-sm-3 col-form-label">〇〇＠ドメイン名</label>
                            <div class="col-sm-7"> 
                              <input type="text" readonly class="form-control" id="douser4" name="">
                            </div>
                            <div class="col-sm-1 mt-2">
                                <a href="javascript:;" class="pr-2" data-toggle="modal" data-target="#passwordModal"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:;" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
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

        <!--Start register password Modal -->
            <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-less">
                            <h5 class="modal-title" id="ipAddressNameModalTitle">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row border-less">
                            <label for="pass_word2" class="col-sm-4 col-form-label">パスワード</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="pass_word2" value="パスワード">
                            </div>
                        </div>
                        <div class="modal-footer border-less">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End password Modal -->

    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>