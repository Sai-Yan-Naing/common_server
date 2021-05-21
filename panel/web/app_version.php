<?php

require_once "common.php";

if(isset($_POST['app']) && $_POST['app']=='WORDPRESS' || $_POST['app'] == "ECCUBE")
{
	$app = $_POST['app'];
	 foreach ($values = app_version($app) as $key => $value) {
    ?>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="app-version"  <?php if($values[0]==$value){ echo "checked";}?>  value="<?= $value ?>"><?= $value ?>
          </label>
        </div>
    <?php
    }
}

?>