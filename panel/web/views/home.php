<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

?>
<?php require("views/header.php") ?>
<?php 

require_once('models/account.php');

$account = new Account;
$multidomain=$account->getMultiDomain($_COOKIE['d'], $_COOKIE['p']);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">

        <!--Start of Sidebar  -->
        <nav id="sidebar"  style="margin-top: 85px;">
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#">
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
                    <div class="col-sm-3">
                        <label for="contract-id">契約ID</label>
                    </div>
                    <div class="col-sm-3">
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
                        <div id="shared-server" class="container tab-pane active"><br>
                            <table class="table table-borderless">
							  <thead>
							    <tr>
							      <th>契約ドメイン</th>
							      <th></th>
							      <th>使用容量</th>
							      <th>サイト</th>
							      <th>アプリケーションプール</th>
							      <th>削除</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php
							  	foreach($multidomain as $domain) {
							  		echo '<tr><td>'.$domain['domain'].'</td><td><a href="dhome.php" class="btn btn-outline-primary btn-sm">設定</a></td><td><span class="btn btn-outline-secondary btn-sm">'.formatBytes(disk_total_space("c:")).'</span></td><td><input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="起動" data-off="停止" data-size="sm"></td><td><input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="起動" data-off="停止" data-size="sm"></td><td><a href='.'"'.'delete_website.php?domainid='.$domain["id"].'"'.' class="btn btn-danger btn-sm">削除</a></td></tr>';
							  	}
							  	 ?>
							  </tbody>
							</table>
							<div class="conButton">
								<a href="add_multi_domain.php" class="domainAdd btn btn-outline-primary btn-sm" role="button">マルチドメイン追加</a>
								<a href="#"  class="domainAcq btn btn-outline-secondary btn-sm">ドメイン取得</a>
								<a href="add_server.php" class="addServer btn btn-outline-primary btn-sm">サーバー追加</a>
							</div>
                        </div>
                        <div id="vps-desktop" class="container tab-pane fade"><br>
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

    <?php 
    	function formatBytes($bytes, $precision = 2) 
		{ 
		    if  ($bytes == 0) return '0 B';
		    $sizes = array('B', 'KB', 'M', 'GB', 'TB');   
		    $base = log($bytes, 1024);
		  
		    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $sizes[floor($base)];
		} 

	?>

<?php require("views/footer.php") ?>