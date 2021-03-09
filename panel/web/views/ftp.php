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
                <?php require("views/server_setting_menu.php") ?>
                <div class="col-sm-10">
                    <h6 class="wserver">Winserver Controlpanel Share server</h6>
                    
                    <div class="rcontent">
                        <div class="ftp-title">ＦＴＰサーバー情報</div>
                        <div class="row ftp-server">
                            <div class="col-sm-3">
                                <span>ＦＴＰサーバー</span>
                            </div>
                            <div class="col-sm-9">
                                <span>収納しているサーバーのＩＰを表示</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <span>FTPアカウント</span>
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapseDirectory" aria-expanded="false" aria-controls="collapseDirectory"><span class="add-db-icon"><i class="fas fa-plus"></i></span>ＦＴＰユーザー追加</button>
                            </div>
                        </div>
                        <div class="collapse" id="collapseDirectory">
                            <div class="wrap">
                                <form action="" method="post" id="ftpUser">
                                    <div class="form-group row">
                                        <label for="ftpuser" class="col-sm-3 col-form-label">FTPユーザー</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="ftpuser" name="ftp_user" placeholder="1-14文字、半角英数字">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass_word" class="col-sm-3 col-form-label">パスワード</label>
                                        <div class="col-sm-8">
                                          <input type="password" class="form-control" id="pass_word" name="password" placeholder="8～70文字、半角英数記号の組み合わせ">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <span>接続許可ディレクトリ</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary active">
                                                        <input type="radio" name="options" id="option1" autocomplete="off" checked> 全て許可
                                                    </label>
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="options" id="option2" autocomplete="off"> ディレクトリ設定
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-5 mb-3">
                                            <input type="text" name="" id="" class="form-control" placeholder="Domainのドキュメントルートを表示">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="reset" class="btn btn-outline-secondary" data-toggle="collapse" data-target="#collapseDirectory">キャンセル</button>
                                        <button type="submit" class="btn btn-outline-secondary">作成</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="mt-3 mb-3">
                            利用中FTP情報
                        </div>
                        <div class="wrap p-t-b-l-r-2">
                            <form action="" method="post" id="">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="user_name">ユーザー名</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control" id="user_name" name="username">
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-2 ">
                                        <label for="password2" >パスワード</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" readonly class="form-control" id="password2" name="password">
                                    </div>
                                    <div class="edit-delete-btn col-sm-1">
                                        <a href="javascript:;" class="edit" data-toggle="modal" data-target="#ftpUseInformationModal"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="javascript:;" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 

            </div>
        </div>

            <!--Start ftp information in use Modal -->
            <div class="modal fade" id="ftpUseInformationModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="" method="" id="ftp-password">
                            <div class="modal-header border-less">
                                <h5 class="modal-title" id="ipAddressNameModalTitle">Change FTP Information Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body border-less">
                                <div class="model-line-spacing row">
                                    <label for="user_name2" class="col-sm-4 col-form-label">ユーザー名</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="user_name2" value="ユーザー名">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="pass_word3" class="col-sm-4 col-form-label">パスワード</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="pass_word3" name="pass_word2" value="パスワード">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-less">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--End password Modal -->


        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>