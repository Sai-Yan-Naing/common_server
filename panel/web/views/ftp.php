<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];
require_once('models/ftp.php');
$getFtp = new Ftp;
$allftp=$getFtp->getAll();
$getWeb = $getFtp->getWebaccount($_COOKIE['d']);
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
                        <div class="ftp-title mb-3">ＦＴＰサーバー情報</div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <span>ＦＴＰサーバー</span>
                            </div>
                            <div class="col-sm-9">
                                <span>203.137.93.207</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label>Root Folder</label>
                            </div>
                            <div class="col-sm-5">
                                <label>/webroot/LocalUser/<?= $getWeb['user'] ?></label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <span>FTPアカウント</span>
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-success common_modal btn-sm" type="button" data-toggle="modal" data-target="#common_modal"   origin_url="ftp.php" re_url="ftp_create.php"><span class="add-db-icon"><i class="fas fa-plus"></i></span>ＦＴＰユーザー追加</button>
                            </div>
                        </div>

                    
                        <!-- <div class="collapse" id="collapseDirectory">
                            <div class="wrap">
                                <form action="" method="post" id="ftpUser">
                                    <div class="form-group row">
                                        <label for="ftpuser" class="col-sm-3 col-form-label">FTPユーザー</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="ftpuser" name="ftp_user" placeholder="1-14文字、半角英数字">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ftp_pass_word" class="col-sm-3 col-form-label">パスワード</label>
                                        <div class="col-sm-8">
                                          <input type="password" class="form-control" id="ftp_pass_word" name="password" placeholder="8～70文字、半角英数記号の組み合わせ">
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
                                        <div class="col-sm-3">
                                            <label>Root Folder</label>
                                        </div>
                                        <div class="col-sm-5 mb-3">
                                            <label>/webroot/LocalUser/mgmg</label>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="reset" class="btn btn-outline-secondary" data-toggle="collapse" data-target="#collapseDirectory">キャンセル</button>
                                        <button type="button" id="add_ftp" class="btn btn-outline-secondary">作成</button>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                        <div class="mt-3 mb-3">
                            利用中FTP情報
                        </div>
                        <div class="row mt-3 mb-3 font-weight-bold">
                            <div class="col-sm-3">
                                <span>FTP ユーザー名</span>
                            </div>
                            <div class="col-sm-3">
                                <span>パスワード</span>
                            </div>

                            <div class="col-sm-3">
                                <span>Permission</span>
                            </div>
                            <div class="col-sm-3">
                                <span>Action</span>
                            </div>
                        </div>
                        <?php 
                        foreach ($allftp as $key => $ftp) {
                            
                        ?>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="douser" class="col-form-label"><?php echo $ftp['username'];?></label>
                            </div>
                            
                            <div class="col-sm-3">
                              <?php echo $ftp['password'];?>
                            </div>
                            
                            <div class="col-sm-3">
                              <?php echo $ftp['permission'];?>
                            </div>

                            <div class="col-sm-3">
                                <p><button edit_id="<?php echo $ftp['id'];?>" origin_url="ftp.php" re_url="ftp_edit.php" class="pr-2 btn btn-warning btn-sm common_modal" data-toggle="modal" data-target="#common_modal"><i class="fas fa-edit text-white"></i></button>
                                <button id="" href="javascript:;" class="pr-2 btn btn-danger btn-sm common_modal_delete"delete_id="<?php echo $ftp['id'];?>" data-toggle="modal" data-target="#common_modal_delete"  origin_url="ftp.php" re_url="ftp_delete.php"><i class="fas fa-trash text-white"></i></button></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div> 

            </div>
        </div>

            <!--Start ftp information in use Modal -->
            <div class="modal fade" id="editFtp" tabindex="-1" role="dialog" aria-labelledby="passwordModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="" method="" id="">
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
                                        <input type="text" readonly class="form-control" ftp="test" fid="test" id="edit_ftp" value="ユーザー名">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="pass_word3" class="col-sm-4 col-form-label">パスワード</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="edit_ftp_pass" name="pass_word2" value="password">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-less">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="edit_ftp_btn" class="btn btn-primary">Save changes</button>
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