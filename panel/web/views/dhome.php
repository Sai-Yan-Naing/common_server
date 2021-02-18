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
                <li class="active">
                    <a href="#">
                        <span class="icon"><i class="fas fa-server"></i></span><br>
                        <span class="title">サーバー設定</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
                    <div><a href="#"><span class="icon"><i class="fas fa-laptop-code"></i></span><span>サイト設定</span></a></div><br>
                    <div><a href="site_security.php"><span class="icon"><i class="fas fa-cogs"></i></span><span>サイトセキュリティ</span></a></div><br>
                    <div><a href="database.php"><span class="icon"><i class="fas fa-database"></i></span><span>データベース</span></a></div><br>
                    <div><a href="#"><span class="icon"><i class="fas fa-laptop-code"></i></span><span>FTP</span></a></div><br>
                    <div><a href="#"><span class="icon"><i class="fas fa-folder"></i></span><span>ファイルマネージャー</span></a></div><br>
                    <div><a href="#"><span class="icon"><i class="fas fa-chart-pie"></i></span><span>アクセス解析</span></a></div><br>
                </div>
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
                            <form action="click_site_setting.php" method="post" id="domain-homepage" />
                                <div class="form-group row">
                                    <label for="application" class="col-sm-4 col-form-label">アプリケーション</label>
                                    <div class="col-sm-3 custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="wordpress" name="app" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="wordpress">Wordpress</label>
                                    </div>
                                    <div class="col-sm-3 custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="eccube" name="app" class="custom-control-input">
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
                                        <input type="radio" id="ver-4" name="ver" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="ver-4">4.9.12</label>
                                    </div>
                                    <div class="col-sm-3 custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="ver-5" name="ver" class="custom-control-input">
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
                            <div class="row">
                                <div class="col-sm-3">
                                    <p>エラーコード</p>
                                </div>
                                <div class="col-sm-7">
                                    <p>ファイルパス</p>
                                </div>
                                <div class="col-sm-2">
                                    <p>利用設定</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="pl-0">402</p>
                                </div>
                                <div class="col-sm-7">
                                    <p>ドキュメントルートのカスタムエラーページPATH</p>
                                </div>
                                <div class="col-sm-2">
                                   <button class="on-off-btn btn btn-primary">
                                       ON | OFF
                                   </button>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="pl-0">403</p>
                                </div>
                                <div class="col-sm-7">
                                    <p>ドキュメントルートのカスタムエラーページPATH</p>
                                </div>
                                <div class="col-sm-2">
                                   <button class="on-off-btn btn btn-primary">
                                       ON | OFF
                                   </button> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="pl-0">404</p>
                                </div>
                                <div class="col-sm-7">
                                    <p>ドキュメントルートのカスタムエラーページPATH</p>
                                </div>
                                <div class="col-sm-2">
                                   <button class="on-off-btn btn btn-primary">
                                       ON | OFF
                                   </button> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="pl-0">500</p>
                                </div>
                                <div class="col-sm-7">
                                    <p>ドキュメントルートのカスタムエラーページPATH</p>
                                </div>
                                <div class="col-sm-2">
                                   <button class="on-off-btn btn btn-primary">
                                       ON | OFF
                                   </button> 
                                </div>
                            </div>
                            <p>サイト転送</p>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status-code">ステータスコード</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="url-spec">URL指定</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="basic-auth" class="col-sm-2 col-form-label">BASIC認</label>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <a href="" class="form-control-plaintext add-basic-auth" id=""><span class="add-icon"><i class="fas fa-plus"></i></span>BASIC認証追加</a>
                                    </div>
                                </div>
                            </div>
                            <!-- basic setting1 -->
                            <button class="basic-setting btn btn-outline-secondary" id="data-dropdown"><span class="down-icon"><i class="fas fa-angle-down"></i></span>BASIC認証設定1</button>

                            <div id="data-item">
                                <p>認証ユーザー</p>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p>ユーザー名</p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>パスワード</p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>パスワード変更</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p>User1</p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>PASSWORD1</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="" id="" placeholder="PASSWORD1">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-outline-dark text-dark">変更</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <button type="submit" class="form-control btn btn-outline-secondary" id="">User追加</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group float-right">
                                    <button type="reset" class="btn btn-outline-dark text-dark">キャンセル</button>
                                    <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                </div>
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


        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>