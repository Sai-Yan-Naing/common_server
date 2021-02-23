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
        <div id="content" class="contract_information"  style="margin-top: 80px;">
            <div class="row">
                <div class="col-sm-2">
                    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
                    <div class="icon-align"><span class="text-center"><?php echo $_COOKIE['d']; ?></span></div><br>
                    <div class="m-40"><span>ドメイン</span></div><br>
                    <div class="m-40"><a href="#"><span>ご契約情報</span></a></div><br>
                    <div class="m-40"><a href="mail_connection.php"><span >ドメイン</span></a></div><br>
                    <div class="m-40"><a href="#"><span>自動バックアップ</span></a></div><br>
                </div>
                <div class="col-sm-10">
                    <h6 class="wserver">Winserver Controlpanel Share server</h6>
                    <div class="contract">
                        <div class="server-info">
                            <h6 class="6">サーバー情報</h6>
                            <div class="text-label-align">
                                基本情報
                            </div>
                            <form action="" method="post" id="" />
                                <div class="form-group row">
                                    <label for="con-server" class="col-sm-3 col-form-label">接続サーバー</label>
                                    <div class="col-sm-8"><span class="col-form-label"> サイトが収納されているＩＰアドレスを表示 </span></div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label">ステータス</label>
                                    <div class="col-sm-2"><span class="col-form-label"> 起動中 </span></div>
                                    <div class="col-sm-6"><input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm"> </div>
                                </div>
                                <div class="form-group row">
                                    <label for="app-pool" class="col-sm-3 col-form-label">アプリケーションプール</label>
                                    <div class="col-sm-2"><span class="col-form-label"> 起動中 </span></div>
                                    <div class="col-sm-6"><input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="capacity-used" class="col-sm-3 col-form-label">使用ディスク容量</label>
                                    <div class="col-sm-4"> <input type="text" class="form-control" id="site-name" name="site_name"></div>
                                    <div class="col-sm-4"><span class="gb"> 〇〇ＧＢ </span></div>
                                </div>
                            </form>
                        </div>

                        <div class="server-info">
                            <div class="text-label-align">
                                ＤＮＳ情報
                            </div>
                            <form action="" method="post" id="" />
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">タイプ</div>
                                    <div class="col-sm-2 col-form-label text-center">ホスト名</div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label">ＩＰアドレス/ドメイン名</div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="mail" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#"><i class="fas fa-pencil-alt"></i> </a></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_domain" name="ip_domain" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="www" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#"><i class="fas fa-pencil-alt"></i> </a></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_domain" name="ip_domain" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#"><i class="fas fa-pencil-alt"></i> </a></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_domain" name="ip_domain" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#"><i class="fas fa-pencil-alt"></i> </a></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_domain" name="ip_domain" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 text-center">
                                        <button type="reset" class="btn btn-outline-dark text-dark">キャンセル</button>
                                        <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>


        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>