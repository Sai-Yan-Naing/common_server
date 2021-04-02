<?php
require_once('models/mysql.php');
require_once('models/mssql.php');
$dbaccount="";
$mysql = new MySQL;
$mssql = new MsSQL;

if(isset($_GET['type']) and $_GET['type']=="edit")
{
   $dbuser = $_GET['dbuser'];
   $dbpass = $_GET['dbpass'];
   $dbaccount=$mysql->changePassword($dbuser,$dbpass);
}
if(isset($_GET['db']) and $_GET['db']=="mysql"){
	$dbaccount=$mysql->getAll();
}elseif (isset($_GET['db']) and $_GET['db']=="mssql") {
		$dbaccount=$mssql->getAll();
}else{;
	$dbaccount=$mysql->getAll();
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
                                                <td><a href="javascript:;" data-toggle="modal" data-target="#usePasswordModal" class="btn btn-warning btn-sm edit_dbuser" dbuser="<?php echo $db['db_user']; ?>"><i class="fas fa-edit text-white"></i></a></td>
                                                <td>情報</td>
                                            </tr>
                                            <?php
                                        		}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>