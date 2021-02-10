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
        <div id="content" class="dhome"  style="margin-top: 130px;">
            <div class="row">
                <div class="col-sm-2">
                    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div>
                    <div class="icon-align"><span class="text-center">a.com</span></div>
                    <div class="icon-align"><span class="text-center">ドメイン</span></div>
                    <div><a href="#"><span class="icon"><i class="fas fa-laptop-code"></i></span><span>サイト設定</span></a></div>
                    <div><a href="#"><span class="icon"><i class="fas fa-cogs"></i></span><span>サイトセキュリティ</span></a></div>
                    <div><a href="#"><span class="icon"><i class="fas fa-database"></i></span><span>データベース</span></a></div>
                    <div><a href="#"><span class="icon"><i class="fas fa-laptop-code"></i></span><span>FTP</span></a></div>
                    <div><a href="#"><span class="icon"><i class="fas fa-folder"></i></span><span>ファイルマネージャー</span></a></div>
                    <div><a href="#"><span class="icon"><i class="fas fa-chart-pie"></i></span><span>アクセス解析</span></a></div>
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
                            <h4>基本設定</h4>
                        </div>
                        <div id="oyo-setting" class="container tab-pane fade"><br>
                            <h5>応用設定</h5>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>