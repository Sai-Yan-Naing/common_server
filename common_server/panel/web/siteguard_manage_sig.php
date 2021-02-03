<?php
require_once("header/validation.php");
require_once("models/siteguard.php");

$sg = new SiteGuard;

switch (intval($_POST['type']))
{
	case 1:
		$sg->add_sig($domain, $_POST['action'], '1', '1,2', '^' . $_POST['protocol'] . '://.*' . $domain . $_POST['string']);
		break;
	case 2:
		$sg->toggle_sig($_POST['sig_name']);
		break;
	case 3:
		$sig = $sg->get_sig($_POST['sig_name']);
		require_once("views/siteguard_edit_sig.php");
		exit();
	case 4:
		$sg->update_sig($_POST['sig_name'], $domain, $_POST['action'], '1', '1,2', '^' . $_POST['protocol'] . '://.*' . $domain . $_POST['string']);
		break;
	case 5:
		$sg->del_sig($_POST['sig_name']);
		break;
}

header("Location: siteguard.php");