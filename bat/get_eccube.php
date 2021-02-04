<?php


$root = 'root';
$root_pass = 'i6Qq3gp7qmGuM5TTXMHs';
$pass_key = 'cee358b7cd218370be64e518934687be';
$dsn1 = 'mysql:host=mysql3.winserver.ne.jp;dbname=japan_system_development';
try {

	$pdo_account = new PDO($dsn1, $root, $root_pass);
	$stmt = $pdo_account->query("SELECT domain, user, ec_dir FROM web_account WHERE eccube_require = 1");

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$user = $row['user'];
		$domain = $row['domain'];
		$ec_dir = $row['ec_dir'];
		$physicalPath = "E:\\webroot\\LocalUser\\" . $user . "\\web";
		echo "xcopy /D /E /Y /I c:\\bat\\eccube $physicalPath\\$ec_dir\n";
		//echo "xcopy /D /E /Y /I c:\\bat\\cp-index\\ec-index.php $physicalPath\n";
		//echo "C:\\Windows\\System32\\inetsrv\\appcmd.exe add app /site.name:$user /path:/eccube /physicalPath:$physicalPath\n";

		$pdo_account->query("UPDATE web_account SET eccube_require = 0 WHERE `user` = '$user'");
	}

}  catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$pdo_account = NULL;
			die();
}
?>
