<?php

//Principal

$ret1 = array("base" => 10, "altura" => 5);
$ret2 = array("base" => 22, "altura" => 9);
$ret3 = array("base" => 16, "altura" => 11);

$retangulos = array($ret1, $ret2, $ret3);

foreach($retangulos as $r) {
	echo "Área do retângulo com base " . $r["base"] . " e alura " . $r["altura"] . ": ";
    echo $r["base"] * $r["altura"];
	echo "<br><br>";
}
