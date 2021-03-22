<?php 
$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];
require("views/dheader.php"); 
require_once('models/account.php');

$account = new Account;
$error_pages=$account->getErrorPages($domain);

?>
<!-- Start of Wrapper  -->
    <div class="wrapper">

        <!--Start of Sidebar  -->
        <?php require("views/sidebar_menu.php") ?>
        <!--End of Sidebar  -->

        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/server_setting_menu.php") ?>
                <div class="col-sm-10">
                    <h6 class="wserver">Winserver Controlpanel Share server</h6>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#app-install">アプリケーションインストール</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kihon-setting">基本設定</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#oyo-setting">応用設定</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="app-install" class="container tab-pane active"><br>
                            <form action="install_app.php" method="post" id="domain-homepage" />
                                <div class="form-group row">
                                    <label for="application" class="col-sm-4 col-form-label">アプリケーション</label>
                                    <div class="col-sm-3 custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="wordpress" name="app" value="wordpress" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="wordpress">Wordpress</label>
                                    </div>
                                    <div class="col-sm-3 custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="eccube" name="app" value="eccube" class="custom-control-input">
                                        <label class="custom-control-label" for="eccube">ECCUBE</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="install-method" class="col-sm-4 col-form-label">インストール方法</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="install-method" value="新規インストール">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="version" class="col-sm-4 col-form-label">バージョン</label>
                                    <div class="col-sm-3 custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="ver-4" name="version" value="4.9.12" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="ver-4">4.9.12</label>
                                    </div>
                                    <div class="col-sm-3 custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="ver-5" name="version" value="5.5.0" class="custom-control-input">
                                        <label class="custom-control-label" for="ver-5">5.5.0</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="url" class="col-sm-3 col-form-label">URL</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="url" name="url" placeholder="http(s)://ドメイン名/入力は任意">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="site-name" class="col-sm-3 col-form-label">サイト名</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="site-name" name="site_name" placeholder="サイト名">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-3 col-form-label">ユーザー名</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="1～255文字、半角英数小文字と_-.@">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">メールアドレス</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="support@winserver.ne.jp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">パスワード</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="8～70文字、半角英数記号の組み合わせ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="database" class="col-sm-3 col-form-label">データベース</label>
                                    <label for="db-name" class="col-sm-3 col-form-label">データベース名</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="db-name" name="db_name" placeholder="データベース名">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <label for="db-username" class="col-sm-3 col-form-label">ユーザー名</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="db-username" name="db_username" placeholder="ユーザー名">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <label for="db-password" class="col-sm-3 col-form-label">パスワード</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="db-password" name="db_password" placeholder="8～70文字、半角英数字記号">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4">
                                        <button type="reset" class="btn btn-outline-dark text-dark">クリア</button>
                                        <button type="submit" class="btn btn-outline-dark text-dark">インストール</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="kihon-setting" class="container tab-pane fade"><br>
                            <p>エラーページ</p>
                            <button id="" href="javascript:;" class="pr-2 btn btn-success" data-toggle="modal" data-target="#addnew_error">Add new error</button>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p>エラーコード</p>
                                </div>
                                <div class="col-sm-5">
                                    <p>ファイルパス</p>
                                </div>
                                <div class="col-sm-2">
                                    <p></p>
                                </div>
                                <div class="col-sm-2">
                                    <p>利用設定</p>
                                </div>
                            </div>
                            <div id="loop_error">
                            <?php
                            // print_r($error_pages[0]['error_pages']);
                            $temp=$error_pages[0]['error_pages'];
                                foreach(json_decode($temp) as $ep) {
                            ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="pl-4"><?php echo $ep->statuscode; ?></p>
                                </div>
                                <div class="col-sm-5">
                                    <p><?php echo $ep->url; ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <p><button id="" href="javascript:;" class="pr-2 btn btn-warning btn-sm error_edit" data-toggle="modal" data-target="#statusURLModal">Edit</button></p>
                                </div>
                                <div class="col-sm-2">
                                    <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm">  
                                </div>
                            </div>
                            <?php
                                }
                             ?>
                             </div>
                            <div class="row">
                                <label for="basic-auth" class="col-sm-2 col-form-label">BASIC認</label>
                                <div class="col-sm-5">
                                    <div class="form-group added-basic">
                                        <a href="javascript:;" type="button" class="form-control add-basic-auth" onclick="addBasic()"><span class="add-icon"><i class="fas fa-plus"></i></span>BASIC認証追加</a>
                                    </div>
                                </div>
                            </div>
                            <!-- basic setting1 -->
                            <button class="basic-setting btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapseDirectory" aria-expanded="false" aria-controls="collapseDirectory"><span class="down-icon"><i class="fas fa-angle-down"></i></span>BASIC認証設定<span id="basicSetting">1</span></button>

                            <div class="collapse data-item" id="collapseDirectory">
                                <div class="row">
                                    <label for="target-dir" class="col-sm-3 col-form-label">対象ディレクトリ</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" readonly class="form-control" name="" id="target-dir" placeholder="設定しているドキュメントルートを表示">
                                        </div>
                                    </div>
                                    <div class="col-sm-1 mt-3">
                                        <a href="javascript:;" class="pr-2" data-toggle="modal" data-target="#targetDirectoryModal"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>
                                <p>認証ユーザー</p>
                                <form action="" method="post" id="passChange">
                                    <div class="row">
                                        <div class="form-group col-sm-3">
                                            <label for="">ユーザー名</label>
                                            <div id="user">User1</div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="pass_word">パスワード</label>
                                            <div type="password">Password1</div>
                                            <!-- <input type="password" readonly class="form-control-plaintext" id="pass_word" value="PASSWORD1"> -->
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="password2">パスワード変更</label>
                                            <input type="password" readonly class="form-control" name="password" id="password2" value="PASSWORD1">
                                        </div>
                                        <div class="form-group col-sm-3 mt-04">
                                            <a href="javascript:;" class="btn btn-outline-dark text-dark" data-toggle="modal" data-target="#passwordChangeModal">変更</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <a href="javascript:;" onclick="addUser()" type="submit" class="form-control add-user" id=""><span class="add-icon"><i class="fas fa-plus"></i></span>User追加</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="reset" class="btn btn-outline-dark text-dark" data-toggle="collapse" data-target="#collapseDirectory">キャンセル</button> 
                                        <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                        <div id="oyo-setting" class="container tab-pane fade"><br>
                            <div class="oyo-set">WEB.config設定</div>
                            <div class="oyo-set">編集対象</div>
                            <div class="form-group row oyo-sett">
                                    <label  class="col-sm-2 col-form-label">WEB.config</label>
                                    <div class="col-sm-6">
                                    <span>WEBコンフィグのドキュメントルート</span>
                                        <textarea type="text" class="form-control" rows="5" cols="30" ></textarea>
                                    </div>
                                    <span class="col-sm-1 mt-5">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
                            </div>

                            <div class="mt-4 oyo-set">PHP設定</div>
                            <span class="oyo-set">PHPバージョン 7.4</span> <i class="fas fa-pencil-alt"></i>
                            <div class="form-group row oyo-sett">
                                    <label  class="col-sm-2 col-form-label">WEB.config</label>
                                    <div class="col-sm-6">
                                        <textarea type="text" class="form-control" rows="5" cols="30"></textarea>
                                    </div>
                                    <span class="col-sm-1 mt-5">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
                            </div>

                            <div class="oyo-set">ASP.NET設定</div>
                            <span class="oyo-set mb-5">.NETバージョン  2.0/3.5</span>  <i class="fas fa-pencil-alt"></i>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Start add new error page -->
            <div class="modal fade" id="addnew_error" tabindex="-1" role="dialog" aria-labelledby="statusURLModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form >
                            <div class="modal-header border-less">
                                <h5 class="modal-title">Change IP Address Name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body border-less">
                                <div class="model-line-spacing row">
                                    <label for="status-code2" class="col-sm-4 col-form-label">ステータスコード</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="status_code" name="status_code">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="url-spec2" class="col-sm-4 col-form-label">URL指定</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="url_spec" name="url_spec">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-less">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="adnewerror" data-dismiss="modal">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End add new error page -->

            <!--Start Status Code and URL Modal -->
            <div class="modal fade" id="statusURLModal" tabindex="-1" role="dialog" aria-labelledby="statusURLModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="" id="changeIp">
                            <div class="modal-header border-less">
                                <h5 class="modal-title" id="ipAddressNameModalTitle">Change IP Address Name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body border-less">
                                <div class="model-line-spacing row">
                                    <label for="status_code" class="col-sm-4 col-form-label">ステータスコード</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="estatus_code" name="status_code" value="401">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="url-spec2" class="col-sm-4 col-form-label">URL指定</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="eurl_spec" name="url_spec" value="ドキュメントルートのカスタムエラーページPATH">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-less">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="edit_error" data-dismiss="modal">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--End Status Code and URL Modal -->

            <!--Start target directory Modal -->
            <div class="modal fade" id="targetDirectoryModal" tabindex="-1" role="dialog" aria-labelledby="targetDirectoryModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="" id="target-directory">
                            <div class="modal-header border-less">
                                <h5 class="modal-title" id="ipAddressNameModalTitle">Change Target Directory</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row border-less">
                                <label for="target-dir2" class="col-sm-4 col-form-label">対象ディレクトリ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="target-dir2" name="target_dir" value="設定しているドキュメントルートを表示">
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
            <!--End target directory Modal -->

            <!--Start authenticated user password change Modal -->
            <div class="modal fade" id="passwordChangeModal" tabindex="-1" role="dialog" aria-labelledby="passwordChangeModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-less">
                            <h5 class="modal-title" id="ipAddressNameModalTitle">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row border-less">
                            <label for="password3" class="col-sm-4 col-form-label">パスワード変更</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password3" value="PASSWORD1">
                            </div>
                        </div>
                        <div class="modal-footer border-less">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End authenticated user password change Modal -->


        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>