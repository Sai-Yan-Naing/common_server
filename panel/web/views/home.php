<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

?>
<?php
require_once('models/account.php');
require("views/header.php") ?>
<?php 


require_once('views/directory_size.php');

$account = new Account;
$multidomain=$account->getMultiDomain($_COOKIE['d']);
?>
<span style="display: none;" re_url="checker" id="domain_checker_fm" tb="web_account"></span>
<span style="display: none;" re_url="checker" id="ftp_user_checker_fm" tb="db_ftp"></span>
<!-- Start of Wrapper  -->
    <div class="wrapper">

        <!--Start of Sidebar  -->
        <nav id="sidebar"  style="margin-top: 85px;">
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="home.php">
                        <span class="icon"><i class="fas fa-tv"></i></span><br>
                        <span class="title">サーバー設定</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-id-badge"></i></span><br>
                        <span class="title">ご契約情報</span>
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
        <div id="content" class="home"  style="margin-top: 80px;">
        	<h6 class="win-cpanel">Winserver Controlpanel</h6>
    		<form class="keiyaku-id">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="contract-id">契約ID</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="contract-id" value="<?php echo $_COOKIE['d']; ?>" readonly>
                    </div>
                </div>
            </form><br>
        
            <div class="row">
                <div class="col-sm-2">
                    <label for="" class="col-form-label">契約サービス</label>
                </div>

                <div class="col-sm-10">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#shared-server">共用サーバー</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#vps-desktop">VPS/デスクトッププラン</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="shared-server" class="tab-pane active"><br>
                            <table class="table table-borderless">
							  <thead>
							    <tr>
							      <th>契約ドメイン</th>
							      <th>Site Setting</th>
							      <th>使用容量</th>
							      <th>サイト</th>
							      <th>アプリケーションプール</th>
							      <th>削除</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php
							  	foreach($multidomain as $domain) {
                                    ?>
							  		<tr>
                                        <td><a href="http://<?php echo $domain['domain'] ?>" class="link-success" target="_blank"><?php echo $domain['domain'] ?></a></td>
                                        <td>

                                            <button type="button" class="btn btn-outline-primary btn-sm" disable>設定</button>
                                        </td>
                                        <td>
                                            <span><?php echo sizeFormat(folderSize("E:/webroot/LocalUser/$domain[user]")) ?></span>
                                        </td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="起動" data-off="停止" data-size="sm" class="site-onoff site" id="<?php echo $domain['user'] ?>" <?php if($domain['stopped']==0){echo "checked";}  ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="起動" data-off="停止" data-size="sm" class="site-onoff app" id="<?php echo $domain['user'] ?>" <?php if($domain['appstopped']==0){echo "checked";} ?>>
                                        </td>
                                        <td>
                                            <!-- <a href="delete_website.php?domainid=<?php echo $domain['id'] ?>" class="btn btn-danger btn-sm">削除</a> -->
                                            <button type="button" class="btn btn-danger btn-sm" disable>削除</button>
                                        </td>
                                    </tr>
                                <?php
							  	}
							  	 ?>
							  </tbody>
							</table>
							<div class="conButton">
                                <!-- <a href="add_multi_domain.php" class="domainAdd btn btn-outline-primary btn-sm" role="button">マルチドメイン追加</a> -->
								<button class="domainAdd btn btn-outline-primary btn-sm common_modal"  data-toggle="modal" data-target="#common_modal" re_url="add_multi_domain.php">マルチドメイン追加</button>
								<a href="#"  class="domainAcq btn btn-outline-secondary btn-sm">ドメイン取得</a>
								<a href="add_server.php" class="addServer btn btn-outline-primary btn-sm">サーバー追加</a>
							</div>
                        </div>
                        <div id="vps-desktop" class="tab-pane fade"><br>
                            <table class="table table-borderless">
							  <thead>
							    <tr>
							      <th></th>
							      <th></th>
							      <th></th>
							      <th>使用容量</th>
							      <th>サイト</th>
							      <th>アプリケーションプール</th>
							      <th>削除</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<tr>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  	</tr>
							  </tbody>
							</table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!--End of Page Content  -->


    </div>
    <!-- End of Wrapper  -->


<?php require("views/footer.php") ?>