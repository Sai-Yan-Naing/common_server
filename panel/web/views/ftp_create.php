<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Create FTP user</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

	<form action="ftp_confirm.php" method="post" id="ftp_create">
		<input type="hidden" name="type" value="add_new">
	    <div class="form-group row">
	        <label for="ftpuser" class="col-sm-4 col-form-label">FTPユーザー</label>
	        <div class="col-sm-8">
	          <input type="text" class="form-control" id="ftpuser" name="ftpuser" placeholder="1-14文字、半角英数字">
              <label for="ftpuser" id="ftpuser_error" class="error"></label>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="ftp_pass_word" class="col-sm-4 col-form-label">パスワード</label>
	        <div class="col-sm-8">
	          <input type="password" class="form-control" id="ftp_pass_word" name="ftp_pass_word" placeholder="8～70文字、半角英数記号の組み合わせ">
              <label for="ftp_pass_word" id="ftp_pass_word_error" class="error"></label>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-sm-4">
	            <div class="form-group">
	                <span>接続許可ディレクトリ</span>
	            </div>
	        </div>
	        <div class="col-sm-8">
	            <div class="form-group">
	                <div class="form-check-inline">
				      <label class="form-check-label">
				        <input type="checkbox" class="form-check-input" id="full_control" name="permission[]" value="F">Full Control
				      </label>
				    </div>
				    <div class="form-check-inline">
				      <label class="form-check-label">
				        <input type="checkbox" class="form-check-input permission" name="permission[]" value="R">Read
				      </label>
				    </div>
				    <div class="form-check-inline">
				      <label class="form-check-label">
				        <input type="checkbox" class="form-check-input permission" name="permission[]" value="W">Write
				      </label>
				    </div>
              		<label for="permission" id="permission_error" class="error"></label>
	            </div>
	        </div>
	    </div>
	</form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="ftp_create">作成</button>
</div>