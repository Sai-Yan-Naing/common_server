<?php
require_once("header/validation.php");
require_once("models/siteguard.php");

$sg = new SiteGuard;
$sigs = $sg->get_sigs($domain);

require_once("views/siteguard.php");