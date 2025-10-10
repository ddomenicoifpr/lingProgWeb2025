<?php

require_once(__DIR__ . "/../../util/config.php");
require_once(__DIR__ . "/../../controller/LoginController.php");

$loginCont = new LoginController();
$loginCont->logout();

header("location: " . URL_BASE . "/view/login/login.php");
exit;