<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];
require_once("config/all.php");
require_once('models/common.php');
require_once('models/backup.php');
$getweball = new Common;
$getWeb = $getweball->getWebaccount($_COOKIE['d']);
$dirname = "G:/backup/$getWeb[user]/";

$backup = new Backup;
$get_backup = $backup->checkScheduler($_COOKIE['d']);
?>
<?php require("views/dheader.php") ?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
       <?php require("views/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <div class="col-sm-2">
                    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
                    <div class="icon-align"><span class="text-center"><?php echo $_COOKIE['d']; ?></span></div><br>
                    <div class="icon-align"><span class="text-center">ドメイン</span></div><br>
                    <div class="icon-align"><span class="text-center">ご契約情報</span></div><br>
                    <div class="icon-align"><span class="text-center">ドメイン</span></div><br>
                    <div class="icon-align"><span class="text-center">自動バックアップ</span></div><br>
                </div>
                <div class="col-sm-10">
                    <h6 class="wserver">Winserver Controlpanel Share server</h6>
                    <div class="rcontent">
                        <div class="mb-3">バックアップ</div>
                        <div class="row">
                            <div class="col-sm-3">
                                <span>自動バックアップ</span>
                            </div>
                            <div class="col-sm-9">
                                <!-- <input type="checkbox" class="data_backup" name="" action="auto_backup" re_url="backup_confirm"> -->
                                <input type="checkbox" class="data_backup" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm" action="auto_backup" re_url="backup_confirm" <?php if((int)$get_backup['scheduler']==1){echo "checked";} ?>>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <span>自動バックアップ</span>
                            </div>
                            <div class="col-sm-5">
                                <button class="btn btn-success btn-sm data_backup" re_url="backup_confirm" action="backup">バックアップを実施</button>
                            </div>
                        </div>
                        <div id="changeBackup">
                        <?php
                            $file = showFolder($dirname);
                            if($file){
                        ?>
                            <table class="table mt-3 table-bordered">
                                <thead>
                                  <tr>
                                    <th>バックアップデータ</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><?= $file ?></td>
                                    <td><?= date("Y-m-d h:i:sA", filemtime($dirname.$file)) ?></td>
                                    <td>
                                        <button type="submit" class="btn btn-warning btn-sm mb-2 mr-3 data_backup" re_url="backup_confirm" action="restore">リストア</button>
                                        <button type="submit" class="btn btn-danger btn-sm mb-2 data_backup" re_url="backup_confirm" action="delete">削除</button>
                                    </td>
                                  </tr>
                                </tbody>
                            </table>
                        
                          <?php 
                            } 
                          ?>
                        </div>
                    </div>
                    
                </div>
            </div>


        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->

    <?php

    /*Show Backup Folder*/
    function showFolder($dir){
        // Open a directory, and read its contents
        if (is_dir($dir)){
            if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                if(($file != '.') && ($file != '..')){
                    return  $file ;
                }
            }
            closedir($dh);
            }
        } 
    }

    ?>

<?php require("views/footer.php") ?>