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
                        <div class="row">
                            <div class="col-sm-3">
                                <span>データベース</span>
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-success btn-sm common_modal" type="button" data-toggle="modal" data-target="#common_modal" re_url="database_create.php"><span class="add-db-icon"><i class="fas fa-plus"></i></span>データベース追加</button>
                            </div>
                        </div>
                        <!-- <div  id="collapseDirectory">
                            <div class="wrap">
                                <form action="database_con.php" method="post" id="database_create">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <span>データベース種別</span>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary active">
                                                    <input type="radio" name="type" id="mysql" value="mysql" autocomplete="off" checked> MYSQL
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="type" id="mssql" value="mssql" autocomplete="off"> MSSQL
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="type" id="mariadb" value="mariadb" autocomplete="off"> MARIADB
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dbname" class="col-sm-3 col-form-label">データベース名</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="dbname" name="db_name" placeholder="8～70文字、半角英数記号の組み合わせ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 col-form-label">ユーザー名</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="username" name="db_username" placeholder="8～70文字、半角英数記号の組み合わせ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass_word" class="col-sm-3 col-form-label">パスワード</label>
                                        <div class="col-sm-7">
                                          <input type="password" class="form-control" id="pass_word" name="db_password" placeholder="8～70文字、半角英数記号の組み合わせ">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="reset" class="btn btn-outline-secondary" data-toggle="collapse" data-target="#collapseDirectory">キャンセル</button>
                                        <button type="submit" class="btn btn-outline-secondary">作成</button>
                                    </div>
                                </form>
                            </div>
                        </div>  -->
                        <div class="db-title">利用中データベース</div>
                        <div class="col-sm-10 mt-3">
                            <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link links btn btn-outline-primary active dis_mysql" data-toggle="tab" db="MYSQL" role="tab">MYSQL</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link links btn btn-outline-primary dis_mysql" data-toggle="tab" db="MSSQL" role="tab">MSSQL</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link links btn btn-outline-primary dis_mysql" data-toggle="tab" db="MARIADB" role="tab">MARIADB</a>
                              </li>
                            </ul>
                            <div class="tab-content" id="dis_database">
                            <?php require_once('dis_dbaccount.php'); ?>
                            </div>
                    </div>

                </div>
            </div>
        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

<?php require("views/footer.php") ?>