<?php 
$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];


// $_SESSION['filepath']=[];
require_once('views/directory_size.php');
?>
<?php require("views/dheader.php") ?>
<?php
require_once('models/common.php');
$getweball = new Common;
$getWeb = $getweball->getWebaccount($_COOKIE['d']);
?>
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
                    <nav class="navbar navbar-expand-sm bg-success navbar-dark">
                      <ul class="navbar-nav mr-auto" id='dir_path'>
                        <li class="nav-item">
                          <a class="nav-link folder_click text-white" foldername="" style="padding: 5px 0; cursor: pointer;">Home<i class="fa fa-home" aria-hidden="true"  style="padding:0 5px"></i><i class="fa fa-angle-right" style="padding:0 5px"></i></a>
                        </li>
                      </ul>
                      <ul class="navbar-nav">
                        <li class="mr-3 mr-l3 common_path" style="cursor: pointer;"><a data-toggle="modal" data-target="#upload_file"><i class="fas fa-upload text-light fa-lg"></i></a></li>
                        <li class="mr-3 mr-l3 common_path" style="cursor: pointer;"><a data-toggle="modal" data-target="#newFolder"><i class="fas fa-folder text-warning fa-lg"></i></a></li>
                        <li class="mr-3 mr-l3 common_path" style="cursor: pointer;"><a data-toggle="modal" data-target="#newFile"><i class="fas fa-file text-white fa-lg"></i></a></li>
                        <li class="mr-3 mr-l3"></li>
                      </ul>

                    </nav>
                    <span id="common_path" path="" style="display: none;"></span>
                <?php
                    $dir    = 'E:/webroot/LocalUser/'.$getWeb['user'];
                    $myfiles = array_diff(scandir($dir,1), array('.', '..')); 

                    // $dir = '/master/files';
                    $directories = array();
                    $files_list  = array();
                    $files = scandir($dir);
                    foreach($files as $file){
                       if(($file != '.') && ($file != '..')){
                          if(is_dir($dir.'/'.$file)){
                             $directories[]  = $file;

                          }else{
                             $files_list[]    = $file;

                          }
                       }
                    }

                ?>
                    <!-- Tab panes -->
                    <div class="tab-content filemanager">
                    	<div class=" pr-3 pl-3 tab-pane active">
                        <table class="table table-borderless table-hover">
                          <thead>
                            <tr>
                              <th class="font-weight-bold">Name</th>
                              <th class="font-weight-bold">Date Modified</th>
                              <th class="font-weight-bold">Type</th>
                              <th class="font-weight-bold">File size</th>
                              <th colspan="2" class="text-center font-weight-bold">Action</th>
                            </tr>
                          </thead>
                          <tbody id="changebody">
                            <?php 
                            foreach ($directories as $key => $value) {
                            ?>
                                <tr>
                                  <th class="align-baseline folder_click" foldername="<?= $value ?>" style="cursor: pointer;">
                                    <i class="fas fa-folder text-warning fa-lg "></i> 
                                    <span><?= $value ?></span>
                                  </th>
                                  <th><?= date("Y-m-d h:i:sA", filemtime($dir.'/'.$value)) ?></th>
                                  <th><?= filetype($dir.'/'.$value)?></th>
                                  <th><?php echo sizeFormat(folderSize($dir.'/'.$value)) ?></th>
                                  <th class="row" colspan="2">
                                    <span class=" col-sm-3"></span>
                                    <button class="btn text-secondary zip_filefolder col-sm-3" re_url="filemanager_confirm.php" path="<?=$value?>" fun="zip">
                                      <i class="fas fa-file-archive"></i>
                                    </button>
                                    <button class="btn text-info col-sm-3 dir_rename" data-toggle="modal" data-target="#dir_rename" file_name="<?= $value ?>" re_url="filemanager_confirm"><i class="fas fa-edit text-warning"></i>
                                    </button>
                                    <button class="btn text-danger delete_filedir col-sm-3" re_url="filemanager_confirm" path="<?=$value?>" action="delete_dir">
                                      <i class="far fa-trash-alt"></i>
                                    </button>
                                  </th>
                                </tr>
                                <?php 
                              }
                              foreach ($files_list as $key => $value) {
                                ?>
                                <tr>
                                  <th class="align-baseline open_file" style="cursor: pointer;" data-toggle="modal" data-target="#open_file" file_name="<?= $value ?>" re_url="filemanager_confirm"><div><i class="fas fa-file text-secondary fa-lg"></i> <?= $value ?></div></th>
                                  <th><?= date("Y-m-d h:i:sA", filemtime($dir.'/'.$value)) ?></th>
                                  <th><?= filetype($dir.'/'.$value)?></th>
                                  <th path="E:\webroot\LocalUser" file="<?=$value?>">
                                    <?php echo sizeFormat(filesize($dir.'/'.$value)) ?>
                                  </th>
                                  <th class="row" colspan="2">
                                    <a href="filemanager_confirm.php?download=<?=$value?>&common_path=" class="btn text-success col-sm-3 download_file">
                                      <i class="fa fa-download"></i>
                                    </a>
                                    <button class="btn text-secondary col-sm-3" re_url="filemanager_confirm" path="<?=$value?>">
                                      <i class="fas fa-file-archive"></i>
                                    </button>
                                    <button class="btn text-info col-sm-3 file_rename" data-toggle="modal" data-target="#file_rename" file_name="<?= $value ?>" re_url="filemanager_confirm"><i class="fas fa-edit text-warning"></i>
                                    </button>
                                    <button class="btn text-danger delete_filedir col-sm-3" re_url="filemanager_confirm" path="<?=$value?>"  action="delete_file">
                                      <i class="far fa-trash-alt"></i>
                                    </button>
                                  </th>
                                </tr>
                            <?php
                            }
                            ?>
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

    <div class="modal fade" id="newFile">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">New File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form re_url="filemanager_confirm" action="file_create" modal="newFile" method="post" id="file_create">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="newfile">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" form="file_create">Create</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="newFolder">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">New Folder</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form re_url="filemanager_confirm" action="folder_create" modal="newFolder" method="post" id="folder_create">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="folder">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" form="folder_create">Create</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="upload_file">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Upload File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form re_url="filemanager_confirm" action="upload" modal="upload_file" method="post" enctype="multipart/form-data" id="upload_newfile">
              <div class="form-group">
                <label>Name</label>
                <input type="file" class="form-control" name="fileToUpload">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" form="upload_newfile">Create</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="open_file">
      <div class="modal-dialog modal-xl">
        <div class="modal-content" id="file_open">
          
        </div>
      </div>
    </div>

    <div class="modal fade" id="file_rename">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Rename File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form re_url="filemanager_confirm" action="rename_file" modal="file_rename" method="post" id="rename_file">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="file_rename">
                <input type="hidden" name="origin_name">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" form="rename_file">save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="dir_rename">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Rename Directory</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form re_url="filemanager_confirm" action="rename_dir" modal="dir_rename" method="post" id="rename_dir">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="dir_rename">
                <input type="hidden" name="origin_name">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" form="rename_dir">save</button>
          </div>
        </div>
      </div>
    </div>

    <style type="text/css">
    textarea {
    background: url(http://i.imgur.com/2cOaJ.png);
    background-attachment: local;
    background-repeat: no-repeat;
    padding-left: 35px;
    padding-top: 10px;
    border-color: #ccc;
    font-size: 13px;
    line-height: 16px;
    width:100%;
  }
</style>
<?php require("views/footer.php") ?>