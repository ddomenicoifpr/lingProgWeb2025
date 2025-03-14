<?php

$carro1 = array("modelo" => "Polo",
                "marca" => "Volkswagen",
                "foto" => "https://quatrorodas.abril.com.br/wp-content/uploads/2022/10/Volkswagen-Polo-Highline-2023-1.jpg");

$carro2 = array("modelo" => "Onix",
                "marca" => "Chevrolet",
                "foto" => "https://media.gm.com/content/dam/Media/images/BR/Vehicles/Chevrolet/autom%C3%B3veis/OnixAdvantage/2018/Product/08.jpg");

$carro3 = array("modelo" => "208",
                "marca" => "Pegeout",
                "foto" => "https://quatrorodas.abril.com.br/wp-content/uploads/2023/07/Peugeot-208-2024-1.jpg");

$carro4 = array("modelo" => "Argo",
                "marca" => "Fiat",
                "foto" => "https://www.automaxfiat.com.br/wp-content/uploads/2022/08/WhatsApp-Image-2022-08-19-at-10.17.21.jpeg");

$carro5 = array("modelo" => "Dolphin",
                "marca" => "BYD",
                "foto" => "https://mundodoautomovelparapcd.com.br/wp-content/uploads/2023/08/BYD-Dolphin.jpg");

$carros = array($carro1, $carro2, $carro3, $carro4, $carro5);

//Gera os cards para cada carro
foreach($carros as $c) {
    echo "<div style='border: solid 1px; width: 300px; margin-top: 20px;'>";
    echo $c["modelo"] . "<br>";
    echo $c["marca"] . "<br>";
    echo "<img style='width: 100%; height: auto;' src='" . $c['foto'] . "' /><br>";
    echo "</div>";
}