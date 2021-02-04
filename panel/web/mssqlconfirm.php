<?php
require_once("header/validation.php");
require_once("config/all.php");
require_once("models/mssql.php");

$version = $_POST["version"];
$db = $_POST["db"];
$db_user = $_POST["db_user"];
$db_password = $_POST["db_password"];
$domain = $_COOKIE["d"];

$mysql = new MySQL;

if (!$mysql->addUserAndDB($version, $db, $db_user, $db_password)) {
	die();
}

if (!$mysql->addList($version, $db, $db_user, $db_password, $domain)) {
	require_once("views/mssqlerror.php");
	die();
}

mb_language("ja");
mb_internal_encoding("UTF-8");
$from = "panel3@winserver.ne.jp";
$to = "sqlset@winserver.ne.jp";
$header = "From: " . mb_encode_mimeheader($from,"UTF-8") . "\r\n";
$subject = "【Winserver】 共用サーバ MSSQL DBファイルサイズ確認依頼：{$domain}";
$message = "下記データベースが作成されました。\r\n\r\n";
$message .= "・ドメイン名： '${domain}'\r\n";
$message .= "・バージョン： '${version}'\r\n";
$message .= "・データベース名： '${db}'\r\n\r\n";
$message .= "ドメイン名と紐づく契約内容を確認してください。\r\n";
$message .= "必要があればバージョンと対応するホストにて、データベースのファイルサイズを更新してください。";
if (!mb_send_mail($to, $subject, $message, $header)) {
	$error_message = "管理者への通知に失敗しました。</br>";
	$error_message .= "お手数をおかけしますがデータベースの登録操作を行った旨を<a href='mailto:support@winserver.ne.jp'>support@winserver.ne.jp</a>までご連絡ください。";
	require_once("views/allerror.php");
	die();
}

require_once("views/mssqlconfirm.php");
?>
