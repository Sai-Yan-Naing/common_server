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
                    <div><a href="dhome.php"><span class="icon"><i class="fas fa-laptop-code"></i></span><span>サイト設定</span></a></div><br>
                    <div><a href="#"><span class="icon"><i class="fas fa-cogs"></i></span><span>サイトセキュリティ</span></a></div><br>
                    <div><a href="database.php"><span class="icon"><i class="fas fa-database"></i></span><span>データベース</span></a></div><br>
                    <div><a href="#"><span class="icon"><i class="fas fa-laptop-code"></i></span><span>FTP</span></a></div><br>
                    <div><a href="#"><span class="icon"><i class="fas fa-folder"></i></span><span>ファイルマネージャー</span></a></div><br>
                    <div><a href="#"><span class="icon"><i class="fas fa-chart-pie"></i></span><span>アクセス解析</span></a></div><br>
                </div>
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
                                <button class="btn btn-outline-secondary"><span class="add-db-icon"><i class="fas fa-plus"></i></span>ＦＴＰユーザー追加</button>
                            </div>
                        </div>
                        <div class="wrap">
                            <form action="" method="post" id="ftpUser">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">FTPユーザー</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="" name="ftp_user" placeholder="1-14文字、半角英数字">
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">パスワード</label>
                                    <div class="col-sm-8">
                                      <input type="password" class="form-control" id="" name="password" placeholder="8～70文字、半角英数記号の組み合わせ">
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <i class="fas fa-pencil-alt"></i>
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
                                            <button class="btn btn-primary">全て許可</button>
                                            <button class="btn btn-primary">ディレクトリ設定</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-5">
                                        <div class="document-root">Domainのドキュメントルートを表示</div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="cancel" class="btn btn-outline-secondary">キャンセル</button>
                                    <button type="submit" class="btn btn-outline-secondary">作成</button>
                                </div>
                            </form>
                        </div>
                        <div class="row mt-4 mb-2">
                            <div class="col-sm-3">
                                <div>利用中FTP情報</div>
                            </div>
                            <div class="col-sm-8"></div>
                            <div class="col-sm-1 mt-3">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                        <div class="wrap p-t-b-l-r-2">
                            <div class="">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="">ユーザー名</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-2 ">
                                        <label for="" >パスワード</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control" id="">
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                </div>
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