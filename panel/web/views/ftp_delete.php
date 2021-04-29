<?php
require_once('models/ftp.php');

// echo "string";
// die();

$addFtp = new Ftp;
$ftp = $addFtp->getFtp($_POST['delete_id']);
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete FTP user</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

	<form action="ftp_confirm.php" method="post" id="delete_ftp">
		<input type="hidden" name="type" value="delete">
		<input type="hidden" name="id" value="<?= $ftp['id'] ?>">
		<input type="hidden" name="username" value="<?= $ftp['username'] ?>">
		Are you sure to delete <b style="color: red"><?= $ftp['username'] ?> </b> ?
	    
	</form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_ftp">Delete</button>
</div>