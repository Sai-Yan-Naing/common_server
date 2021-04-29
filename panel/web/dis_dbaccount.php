<?php
require_once('models/mysql.php');
require_once('models/mariadb.php');
require_once('models/mssql.php');
$dbaccount="";
$mysql = new MySQL;
$mariadb = new MariaDB;
$mssql = new MsSQL;
if(empty($_COOKIE['d']))
{
    die("no_cookie");
}
if(isset($_POST['type']) and $_POST['type']=="edit")
{
    $dbuser = $_POST['dbuser'];
    $dbpass = $_POST['dbpass'];

    if(isset($_POST['db']) and $_POST['db']=="mariadb"){
            $mariadb->changePassword($dbuser,$dbpass);
            $dbaccount=$mariadb->getAll();
    }elseif (isset($_POST['db']) and $_POST['db']=="mssql") {
            $dbaccount=$mssql->changePassword($dbuser,$dbpass);
            $dbaccount=$mssql->getAll();
    }else{
            $dbaccount=$mysql->changePassword($dbuser,$dbpass);
            $dbaccount=$mysql->getAll();
    }
}else if(isset($_POST['type']) and $_POST['type']=="delete"){
    $dbid = $_POST['dbid'];
    $dbuser = $_POST['dbuser'];
    $dbname = $_POST['dbname'];
    // die();
    if(isset($_POST['db']) and $_POST['db']=="mariadb"){
            echo $mariadb->deleteDB($dbid,$dbuser,$dbname);
            die();
            // $dbaccount=$mariadb->getAll();
    }elseif (isset($_POST['db']) and $_POST['db']=="mssql") {
            echo $dbaccount=$mssql->deleteDB($dbid,$dbuser,$dbname);
            die();
            // $dbaccount=$mssql->getAll();
    }else{
            echo $dbaccount=$mysql->deleteDB($dbid,$dbuser,$dbname);
            die();
            // $dbaccount=$mysql->getAll();
    }
}else{
    if(isset($_POST['db']) and $_POST['db']=="MARIADB"){
        $dbaccount=$mariadb->getAll();
    }elseif (isset($_POST['db']) and $_POST['db']=="MSSQL") {
            $dbaccount=$mssql->getAll();
    }else{
        $dbaccount=$mysql->getAll();
    }
}

?>
<div class="tab-pane tab-bg active" id="home" role="tabpanel">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>データベース名</th>
                                                <th>ユーザー名</th>
                                                <th>パスワード</th>
                                                <th>編集</th>
                                                <th>接続先情報</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
                                        		foreach($dbaccount as $db) {
                                        	?>
                                            <tr>
                                                <td><?php echo $db['db_name']; ?></td>
                                                <td><?php echo $db['db_user']; ?></td>
                                                <td><?php echo $db['pass']; ?></td>
                                                <td>
                                                    <a href="javascript:;" data-toggle="modal" data-target="#common_modal" class="btn btn-warning btn-sm edit_database common_modal"  re_url="database_edit.php" edit_id="<?php echo $db['id']; ?>" db="MYSQL"><i class="fas fa-edit text-white"></i></a>
                                                    <a href="javascript:;"  data-toggle="modal" data-target="#common_modal_delete" class="btn btn-danger btn-sm edit_database common_modal_delete" re_url="database_delete.php" delete_id="<?php echo $db['id']; ?>" db="MYSQL"><i class="fas fa-trash text-white"></i></a>
                                                </td>
                                                <td>情報</td>
                                            </tr>
                                            <?php
                                        		}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>