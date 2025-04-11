<?php

//Receber os parâmetros
$n1 = $_GET['nro1'];
$n2 = $_GET['nro2'];
$n3 = $_GET['nro3'];

if(isset($_GET['nro1']) && isset($_GET['nro2']) && isset($_GET['nro3'])) {
    //Fazer a soma
    $soma = $n1 + $n2 + $n3;
    $media = $soma / 3;

    //Exibir o resultado
    echo "Média: " . $media . "<br>";
} else
    echo "Favor informar os parâmetros nro1, nro2 e nro3!";