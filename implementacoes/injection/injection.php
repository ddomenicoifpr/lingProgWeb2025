<?php

//Parâmetro: ?titulo=' OR '1'='1

require_once("util/Conexao.php");

$con = Conexao::getConexao();

$titulo = "";
if(isset($_GET['titulo']))
    $titulo = $_GET['titulo'];

//Consulta SQL vulnerável ao SQL Injection
$sql = "SELECT * FROM livros WHERE titulo = '$titulo'";

$stm = $con->prepare($sql);
$stm->execute();
$result = $stm->fetchAll();
echo "<pre>" . print_r($result, true) . "</pre>";
