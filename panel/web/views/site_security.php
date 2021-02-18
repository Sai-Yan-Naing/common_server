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
        <div id="content" class="site-security"  style="margin-top: 80px;">
            <div class="row">
                <div class="col-sm-2">
                    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
                    <div class="icon-align"><span class="text-center"><?php echo $_COOKIE['d']; ?></span></div><br>
                    <div class="icon-align"><span class="text-center">ドメイン</span></div><br>
                    <div><a href="dhome.php"><span class="icon"><i class="fas fa-laptop-code"></i></span><span>サイト設定</span></a></div><br>
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
                            <a class="nav-link active" data-toggle="tab" href="#ssl">SSL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#waf">WAF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dir-access">ディレクトリアクセス</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ip-restriction">IPアクセス制限</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="ssl" class="container tab-pane active"><br>
                            <form action="" method="post" id="free-ssl" />
	                            <div class="form-group row">
	                                <span class="col">無料SSL設定</span>
	                            </div>
	                            <div class="form-group row">
	                                <label for="common-name" class="col-sm-2 col-form-label">コモンネーム</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control" id="common-name" name="common_name" placeholder="例：www.assistup.co.jp">
									</div>
									<span class="col-sm-1 mt-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
	                            </div>
	                            <div class="form-group row">
	                                <label for="country" class="col-sm-2 col-form-label">COUNTRY</label>
	                                <div class="col-sm-8">
	                                    <span>ＪＰ</span>
									</div>
	                            </div>
								<div class="form-group row">
	                                <label for="prefecture " class="col-sm-2 col-form-label">都道府県（Ｓ）</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control" id="prefecture" name="prefecture" placeholder="例：Osaka">
									</div>
									<span class="col-sm-1 mt-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
	                            </div>
								<div class="form-group row">
	                                <label for="municipality" class="col-sm-2 col-form-label">市区町村（Ｌ）</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control" id="municipality" name="municipality" placeholder="例：Osaka-si">
									</div>
									<span class="col-sm-1 mt-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
	                            </div>
								<div class="form-group row">
	                                <label for="organization" class="col-sm-2 col-form-label">組織名（Ｏ）</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control" id="organization" name="organization" placeholder="例：assistup Inc. ">
									</div>
									<span class="col-sm-1 mt-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
	                            </div>
								<div class="form-group row">
	                                <label for="department" class="col-sm-2 col-form-label">部署名（ＯＵ）</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control" id="department" name="department" placeholder="例：System Development Section">
									</div>
									<span class="col-sm-1 mt-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
	                            </div>
								<div class="form-group row">
									<span class="border border-danger text-danger notice-msg">入力項目については半角英数字にてご入力ください。全角では入力できません。</span>
								</div>
                                <div class="form-group row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-outline-dark text-dark">登録</button>
                                    </div>
                                </div>
                                <div class="form-group row">
	                                <span class="col">有料SSL設定</span>
	                            </div>
                                <div class="form-group row">
	                                <label for="ssl-list" class="col-sm-2 col-form-label">有料SSL</label>
	                                <div class="col-sm-8">
                                        <select class="form-control">
                                            <option>オプションで申し込んでいているSSL種別を記載</option>
                                        </select>
									</div>
	                            </div>
                                <div class="form-group row">
	                                <label for="exp-date" class="col-sm-2 col-form-label">SSL有効期限</label>
	                                <div class="col-sm-8">
	                                    <input type="text" readonly class="form-control" id="exp-date" name="exp_date" value=" 2020/10/8">
									</div>
	                            </div>
                            </form>
                        </div>
                        <div id="waf" class="container tab-pane fade"><br>
                            <form action="" method="post" id="" />
	                            <div class="form-group row">
	                                <span class="col">WAF設定</span>
	                            </div>
	                            <div class="form-group row">
	                                <label for="usage-setting" class="col-sm-2 col-form-label">利用設定</label>
                                    <label class="switch">
                                        <input type="checkbox" class="primary">
                                        <span class="slider"></span>
                                    </label>
               
	                            </div>
	                            <div class="form-group row">
	                                <label for="display-switch" class="col-sm-2 col-form-label">表示切替</label>
                                    <label class="switch">
                                        <input type="checkbox" class="primary">
                                        <span class="slider"></span>
                                    </label>
	                            </div>
                                <div class="form-group row">
	                                <span class="col-sm-2 text-center">日時</span>
                                    <span class="col-sm-5 text-center">攻撃ターゲットURL</span>
                                    <span class="col-sm-5 text-center">攻撃元IPアドレス</span>
	                            </div>
                                <table class="table table-bordered table-waf">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="waf-odd">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="waf-even">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="waf-odd">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="waf-even">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="waf-odd">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div id="dir-access" class="container tab-pane fade"><br>
                            <div class="row">
                                <label for="add-dir" class="col-sm-6 col-form-label">ディレクトリアクセス制限</label>
                                <div class="col-sm-6">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapseDirectory" aria-expanded="false" aria-controls="collapseDirectory">
                                        <span class="dir-icon"><i class="fas fa-plus"></i></span>ディレクトリ追加
                                    </button>
                                </div>
                            </div>
                            <div class="collapse" id="collapseDirectory">
                                <div class="card card-body">
                                    <form action="" method="post" id="add-directory" />
                                        <div class="form-group row">
                                            <label for="add-dir" class="col-sm-4 col-form-label">ディレクトリ</label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dir-path" class="col-sm-4 col-form-label">ドキュメントルートのディレクトリPATH/</label>
                                            <div class="col-sm-7">
	                                            <input type="text" class="form-control" id="dir-path" name="dir_path">
									        </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-9"></div>
                                            <div class="col-sm-3">
                                                <button type="reset" class="btn btn-outline-dark text-dark">キャンセル</button>
                                                <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--Accordion wrapper-->
                            <div class="accordionDir" id="accordionDir" role="tablist">
                                <!-- Card header -->
                                <div class="row" role="tab" id="directoryTab">
                                    <span class="col-sm-3">
                                        <a data-toggle="collapse"  href="#directory" aria-expanded="true"
                                        aria-controls="directory">
                                            <h5><span class="dir-icon"><i class="fas fa-angle-down rotate-icon"></i></span>ディレクトリ</h5>
                                        </a>
                                    </span>
                                    <span class="col-sm-1 dir-icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                </div>
                                <!-- Card body -->
                                <div id="directory" class="collapse show" role="tabpanel" aria-labelledby="directoryTab"
                                data-parent="#accordionDir">
                                    <div class="card-body">
                                        <form action="" method="post" id="dir-information" />
                                            <div class="form-row">
                                                <div class="col-md-5 mb-3">
                                                    <label for="user">ユーザー名</label>
                                                    <input type="text" class="form-control" id="user" name="user" placeholder="1-14文字、半角英数字">
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="password">パスワード</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="8～70文字、半角英数記号の組み合わせ">
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <span class=""><i class="fas fa-pencil-alt"></i></span><br>
                                                    <span class="dir-icon trash-icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-8"></div>
                                                <div class="col-sm-3">
                                                    <button type="reset" class="btn btn-outline-dark text-dark">キャンセル</button>
                                                    <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion wrapper -->
                        </div>
                        <div id="ip-restriction" class="container tab-pane fade"><br>
                            <form action="" method="post" id="" />
	                            <div class="form-group row">
	                                <span class="col">IPアクセス制限</span>
	                            </div>
	                            <div class="form-group row">
	                                <label for="blacklist" class="col-sm-3 col-form-label">ブラックリスト</label>
	                            </div>
                                <div class="form-group row">
                                    <span class="col-sm-1"></span>
	                                <div class="col-sm-6">
                                        <textarea type="text" class="form-control" id="blacklist" name="blacklist" rows="5" cols="30"></textarea>
                                    </div>
									<span class="col-sm-1 mt-5">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
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