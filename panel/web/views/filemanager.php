<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

?>
<?php require("views/dheader.php") ?>
<!-- Start of Wrapper  -->
    <div class="wrapper">

        <?php require("views/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="site-security"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/server_setting_menu.php") ?>
                <div class="col-sm-10">
                    <h6 class="wserver">Winserver Controlpanel Share server</h6>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active">Upload</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">New Folder</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    	<div id="ssl" class=" pr-3 pl-3 tab-pane active">
                    		<?php
								$dir    = 'E:\webroot\LocalUser';
								$fileList = glob('E:\webroot\LocalUser/*');
								$myfiles = array_diff(scandir($dir), array('.', '..')); 
  					
  								foreach ($myfiles as $key => $value) {
  									if (!is_file('E:\webroot\LocalUser/'.$value))
  									{?>
  										<div><i class="fas fa-folder"></i></div>
  									<?php
  									}else{
  										echo $value."<br>";
  									}
  									
  								}

  								foreach($fileList as $filename){
								    if(is_file($filename)){
								        echo $filename, '<br>'; 
								    }else{
								    	?>
								    	<div><i class="fas fa-folder"></i></div>
								    <?php	
								    }   
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
    

<?php require("views/footer.php") ?>