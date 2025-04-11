<?php

//Receber os parâmetros
$n1 = $_POST['nro1'];
$n2 = $_POST['nro2'];
$n3 = $_POST['nro3'];

if(isset($_POST['nro1']) && isset($_POST['nro2']) && isset($_POST['nro3'])) {
    //Fazer a soma
    $soma = $n1 + $n2 + $n3;
    $media = $soma / 3;

    //Exibir o resultado
    echo "Média: " . $media . "<br>";
} else
    echo "Favor informar os parâmetros nro1, nro2 e nro3!";