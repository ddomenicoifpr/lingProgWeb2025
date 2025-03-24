<?php 

require_once("model/Presidente.php");

function linhaPresidente(Presidente $pre) {
    echo "<tr>";
    echo "<td><img src='" . $pre->getFoto() . "' height='100' /></td>";
    echo "<td>" . $pre->getNumero() . "</td>";
    echo "<td>" . $pre->getNome() . "</td>";
    echo "<td>" . $pre->getInicio() . "</td>";
    echo "<td>" . $pre->getFim() . "</td>";
    echo "</tr>";
}

//Declarar os array
$p1 = new Presidente(16, "Eurico Gaspar Dutra", 1946, 1951, "https://upload.wikimedia.org/wikipedia/commons/5/55/GASPARDUTRA.jpg");
$p2 = new Presidente(17, "Getúlio Vargas", 1951, 1954, "https://upload.wikimedia.org/wikipedia/commons/5/50/Getulio_Vargas_%281930%29.jpg");
$p3 = new Presidente(18, "Café Filho", 1954, 1955, "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Caf%C3%A9_Filho.jpg/800px-Caf%C3%A9_Filho.jpg");
$p4 = new Presidente(19, "Carlos Luz", 1955, 1955, "https://upload.wikimedia.org/wikipedia/commons/e/e3/CarlosLuz.jpg");
$p5 = new Presidente(20, "Nereu Ramos", 1955, 1956, "https://upload.wikimedia.org/wikipedia/commons/d/d2/Presidente_Nereu_Ramos.jpg");
$p6 = new Presidente(21, "Juscelino Kubitschek", 1956, 1961, "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Juscelino.jpg/800px-Juscelino.jpg");

$presids = array($p1, $p2, $p3, $p4, $p5, $p6);

//Cabeçalho
echo "<table border=1>";
echo "<tr>";
echo "<th>Foto</th>";
echo "<th>Número</th>";
echo "<th>Nome</th>";
echo "<th>Início</th>";
echo "<th>Fim</th>";
echo "</tr>";

//Gerar as linhas com os dados
foreach($presids as $p) {
    linhaPresidente($p);
}

echo "</table>";