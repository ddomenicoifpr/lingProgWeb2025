<?php

if(isset($_GET['valor1']) && isset($_GET['valor2'])) {
    $valor1 = $_GET['valor1'];
    $valor2 = $_GET['valor2'];

    $soma = $valor1 + $valor2;
    $subtracao = $valor1 - $valor2;
    $divisao = $valor1 / $valor2;
    $multip = $valor1 * $valor2;
    $resto = $valor1 % $valor2;

    echo "Operações em " . $valor1 . " e " . $valor2 . ":<br>";

    echo "- Soma: " . $soma . "<br>";
    echo "- Subtração: " . $subtracao . "<br>";
    echo "- Divisão: " . $divisao . "<br>";
    echo "- Multiplicação: " . $multip . "<br>";
    echo "- Resto: " . $resto . "<br>";
} else
    echo "Informe os parâmetros 'valor1' e 'valor2'!";