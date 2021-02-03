<?php


$root = 'root';
$root_pass = 'i6Qq3gp7qmGuM5TTXMHs';
$pass_key = 'cee358b7cd218370be64e518934687be';
$dsn1 = 'mysql:host=mysql3.winserver.ne.jp;dbname=japan_system_development';
try {

	$pdo_account = new PDO($dsn1, $root, $root_pass);
	$stmt = $pdo_account->query("SELECT domain, user, word_dir FROM web_account WHERE wordpress_require = 1");

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$user = $row['user'];
		$domain = $row['domain'];
		$word_dir = $row['word_dir'];
		$physicalPath = "E:\\webroot\\LocalUser\\" . $user . "\\web";
		if (strcmp($word_dir, "") == 0) {
			echo "move $physicalPath\\index.php $physicalPath\\index-old.php\n";
		}

		$stmt_db = $pdo_account->query("SELECT db_name, db_user, pass FROM db_account WHERE domain = '$domain'");
		$db = $stmt_db->fetch(PDO::FETCH_ASSOC);
		$db_name = $db['db_name'];
		$db_user = $db['db_user'];
		$db_pass = $db['pass'];
		$timestamp = time();
		echo "xcopy /D /E /Y /I c:\\bat\\wordpress $physicalPath\\$word_dir\n";
		//echo "xcopy /D /E /Y /I c:\\bat\\cp-index\\wd-index.php $physicalPath\n";
		//echo "C:\\Windows\\System32\\inetsrv\\appcmd.exe add app /site.name:$user /path:/wordpress /physicalPath:$physicalPath\n";
		if (strcmp($word_dir, "") == 0) {
			echo "echo define('DB_NAME', '$db_name'); >> $physicalPath\\wp-config.php\n";
			echo "echo define('DB_USER', '$db_user'); >> $physicalPath\\wp-config.php\n";
			echo "echo define('DB_PASSWORD', '$db_pass'); >> $physicalPath\\wp-config.php\n";
			echo "echo \$table_prefix  = 'wp$timestamp" . "_'; >> $physicalPath\\wp-config.php\n";
			echo "echo if ( !defined('ABSPATH') ) define('ABSPATH', dirname(__FILE__) . '/');  >> $physicalPath\\wp-config.php\n";
			echo "echo require_once(ABSPATH . 'wp-settings.php'); >> $physicalPath\\wp-config.php\n";
		} else {
			echo "echo define('DB_NAME', '$db_name'); >> $physicalPath\\$word_dir\\wp-config.php\n";
			echo "echo define('DB_USER', '$db_user'); >> $physicalPath\\$word_dir\\wp-config.php\n";
			echo "echo define('DB_PASSWORD', '$db_pass'); >> $physicalPath\\$word_dir\\wp-config.php\n";
			echo "echo \$table_prefix  = 'wp$timestamp" . "_'; >> $physicalPath\\$word_dir\\wp-config.php\n";
			echo "echo if ( !defined('ABSPATH') ) define('ABSPATH', dirname(__FILE__) . '/'); >> $physicalPath\\$word_dir\\wp-config.php\n";
			echo "echo require_once(ABSPATH . 'wp-settings.php'); >> $physicalPath\\$word_dir\\wp-config.php\n";
		}
		$pdo_account->query("UPDATE web_account SET wordpress_require = 0 WHERE `user` = '$user'");
	}

}  catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$pdo_account = NULL;
			die();
}
?>
