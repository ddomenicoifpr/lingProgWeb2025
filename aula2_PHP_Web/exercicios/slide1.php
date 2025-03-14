<?php

$somaPar = 0;
$somaImpar = 0;
for($i=20; $i<=70; $i++) {
    if($i % 2 == 0) //PAR
        $somaPar = $somaPar + $i;
    else //IMPAR
        $somaImpar = $somaImpar + $i;
}

echo "Soma dos números pares entres 20 e 70: " . $somaPar;
echo "<br>Soma dos números ímpares entres 20 e 70: " . $somaImpar;