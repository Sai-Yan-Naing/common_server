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
                        <div class="row">
                            <div class="col-sm-3">
                                <span>データベース</span>
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-outline-secondary"><span class="add-db-icon"><i class="fas fa-plus"></i></span>データベース追加</button>
                            </div>
                        </div>
                        <div class="wrap">
                            <form action="" method="post" id="db-page">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <span>データベース種別</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <ul class="sql">
                                            <li>MYSQL</li>
                                            <li>MSSQL</li>
                                            <li>MARIADB</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">データベース名</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="" name="db_name" placeholder="8～70文字、半角英数記号の組み合わせ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">ユーザー名</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="" name="user_name" placeholder="8～70文字、半角英数記号の組み合わせ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">パスワード</label>
                                    <div class="col-sm-8">
                                      <input type="password" class="form-control" id="" name="password" placeholder="8～70文字、半角英数記号の組み合わせ">
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="cancel" class="btn btn-outline-secondary">キャンセル</button>
                                    <button type="submit" class="btn btn-outline-secondary">作成</button>
                                </div>
                            </form>
                        </div> 
                        <div class="db-title">利用中データベース</div>
                        <div class="wrap2">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">データベース名</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">ユーザー名</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">パスワード</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" id="">
                                </div>
                                <span class="col-sm-1 mt-2">
                                    <i class="fas fa-pencil-alt"></i>
                                </span>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">接続先情報</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="">
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