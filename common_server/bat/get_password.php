<?php


$root = 'root';
$root_pass = 'i6Qq3gp7qmGuM5TTXMHs';
$pass_key = 'cee358b7cd218370be64e518934687be';
$dsn1 = 'mysql:host=mysql3.winserver.ne.jp;dbname=japan_system_development';
try {

	$pdo_account = new PDO($dsn1, $root, $root_pass);
	$stmt = $pdo_account->query("SELECT * FROM current_pass WHERE 1");

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$id = $row['web_id'];
		$stmt2 = $pdo_account->query("SELECT user FROM web_account WHERE `id` = '$id'");
		$data = $stmt2->fetch(PDO::FETCH_ASSOC);
		
		echo "net user '" . stripslashes($data['user']) . "' '" . stripslashes($row['password']) . "'\n";
		$stmt2 = NULL;
		$pdo_account->query("DELETE FROM current_pass WHERE `web_id` = '$id'");
	}

}  catch (PDOException $e) {
			print('Error ' . $e->getMessage());
			$pdo = NULL;
			die();
}
?>
