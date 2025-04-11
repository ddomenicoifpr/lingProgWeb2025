<?php

require_once("model/Pessoa.php");

//Receber os parâmetros
$tipo = "";
if(isset($_GET['tipo']) && 
    ($_GET['tipo'] == 'A' || $_GET['tipo'] == 'C'))
    $tipo = $_GET['tipo'];

if($tipo != '') {

    //Array
    if($tipo == 'A') { 
        $pessoa["nome"] = $_GET['nome'];
        $pessoa["sobrenome"] = $_GET['sobrenome'];
        $pessoa["idade"] = $_GET['idade'];

        echo "<span style='font-weight: bold;'>Nome completo:</span>";
        echo $pessoa["nome"] . " " . $pessoa["sobrenome"];
        echo "<br>";

        echo "<span style='font-weight: bold;'>Idade:</span>";
        echo $pessoa["idade"];

    //Classe e objeto
    } else if($tipo == 'C') { 
        $pessoa = new Pessoa();
        $pessoa->setNome($_GET['nome'])
               ->setSobrenome($_GET['sobrenome'])
               ->setIdade($_GET['idade']);
        echo $pessoa;
    } 

} else
    echo "Informe o parâmetro [tipo] com valores A ou C!";