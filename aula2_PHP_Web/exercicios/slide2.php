<?php

function media($v1, $v2, $v3) {
	$media = ($v1 + $v2 + $v3) / 3;
    return $media;
}

//Principal

echo "Média dos números 4, 7 e 10: " . media(4, 7, 10);
echo "<br><br>";

echo "Média dos números 23, 12 e 6: " . media(23, 12, 6);
echo "<br><br>";

echo "Média dos números 55, 11 e 99: " . media(55, 11, 99);
echo "<br><br>";
