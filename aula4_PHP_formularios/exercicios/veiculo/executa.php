<?php

require_once("modelo/Veiculo.php");

//veiculo_exec.php
$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$combust = $_POST["combustivel"];

//Criar o objeto
$veiculo = new Veiculo();
$veiculo
    ->setModelo($modelo)
    ->setMarca($marca)
    ->setCombustivel($combust);

echo "<h1>Dados informados para o veículo</h1>";
echo "Modelo: " . $veiculo->getModelo() . "<br>";
echo "Marca: " . $veiculo->getMarca() . "<br>";
echo "Combustível: " . $veiculo->getCombustivelCompleto() . "<br>";
echo "<br><br>";
echo "<a href='form.php'>Cadastrar outro veículo</a>";