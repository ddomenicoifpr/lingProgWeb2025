<?php

function desenhaLinha($nome, $habitantes, $area, $altitude, $estado) {
    echo "<tr>";
    echo "<td>" . $nome . "</td>";
    echo "<td>" . $habitantes . "</td>";
    echo "<td>" . $area . "km²</td>";
    echo "<td>" . $altitude . "m</td>";
    echo "<td>" . $estado . "</td>";
    echo "</tr>";
}

//Programa principal
echo "<h1>Lista de cidades</h1>";

echo "<table border='1'>";

echo "<tr>";
echo "<th>Nome</th>";
echo "<th>Habitantes</th>";
echo "<th>Área</th>";
echo "<th>Altitude</th>";
echo "<th>Estado</th>";
echo "</tr>";

//Cidades
desenhaLinha("Foz do Iguaçu", 250000, 500, 145, "Paraná-PR");
desenhaLinha("Cascavel", 300000, 420, 320, "Paraná-PR");
desenhaLinha("Chapecó", 240000, 120, 620, "Santa Catarina-SC");
desenhaLinha("Blumenau", 330000, 200, 85, "Santa Catarina-SC");
desenhaLinha("Curitiba", 1500000, 300, 850, "Paraná-PR");


echo "</table>";