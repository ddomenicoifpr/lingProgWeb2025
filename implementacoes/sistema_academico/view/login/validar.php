<?php

require_once(__DIR__ . "/../../util/config.php");
require_once(__DIR__ . "/../../controller/LoginController.php");

$loginCont = new LoginController();
$estaLogado = $loginCont->usuarioEstaLogado();
if(! $estaLogado) {
    header("location: " . URL_BASE . "/view/login/login.php");
    exit;
}