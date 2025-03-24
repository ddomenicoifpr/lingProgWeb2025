<?php

//Função - Desenha um linha com base nos dados recebidos por parâmetro
function desenhaLinha(array $linha) {
    echo "<tr>";
    echo "<td>" . $linha["ordem"] . "</td>";
    
    echo "<td>";
    echo "<img src='" . $linha["bandeira"] . "' >" . $linha["pais"];
    echo "</td>";
    
    echo "<td>" . $linha["ouro"] . "</td>";
    echo "<td>" . $linha["prata"] . "</td>";
    echo "<td>" . $linha["bronze"] . "</td>";
    echo "<td>" . $linha["total"] . "</td>";
    echo "</tr>";
}


//A - Declarando os 5 arrays associativos (um para cada linha)
$linha1 = array("ordem" => 1, "pais" => "EUA", "ouro" => 46, 
                "prata" => 37, "bronze" => 38, "total" => 121,
                "bandeira" => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/22px-Flag_of_the_United_States.svg.png");
$linha2 = array("ordem" => 2, "pais" => "GBR", "ouro" => 27, 
                "prata" => 23, "bronze" => 17, "total" => 67,
                "bandeira" => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/22px-Flag_of_the_United_Kingdom_%283-5%29.svg.png");
$linha3 = array("ordem" => 3, "pais" => "CHN", "ouro" => 26, 
                "prata" => 18, "bronze" => 26, "total" => 70,
                "bandeira" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_the_People%27s_Republic_of_China.svg/22px-Flag_of_the_People%27s_Republic_of_China.svg.png");
$linha4 = array("ordem" => 4, "pais" => "RUS", "ouro" => 19, 
                "prata" => 17, "bronze" => 20, "total" => 56,
                "bandeira" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Russia.svg/22px-Flag_of_Russia.svg.png");
$linha5 = array("ordem" => 5, "pais" => "ALE", "ouro" => 17, 
                "prata" => 10, "bronze" => 15, "total" => 42,
                "bandeira" => "https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Germany.svg/22px-Flag_of_Germany.svg.png");

//B - Criando a matriz
$linhas = array($linha1, $linha2, $linha3, $linha4, $linha5);

echo "<table border=1>";

//Cabeçalho
echo "<tr>";
echo "<td>Ordem</td>";
echo "<td>País</td>";
echo "<td>Ouro</td>";
echo "<td>Prata</td>";
echo "<td>Bronze</td>";
echo "<td>Total</td>";
echo "</tr>";

//C - Percorrendo a matriz para gerar as linhas da tabela (chamar função)
foreach($linhas as $l) 
    desenhaLinha($l);

echo "</table>";