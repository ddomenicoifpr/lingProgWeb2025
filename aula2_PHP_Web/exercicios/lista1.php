<?php 

for($i=1; $i<=8; $i++) {
    $cor = "";
    if($i==1)
        $cor = "yellow";
    elseif($i==2)
        $cor = "blue";
    elseif($i==3)
        $cor = "black";
    elseif($i==4)
        $cor = "green";
    elseif($i==5)
        $cor = "red";
    elseif($i==6)
        $cor = "purple";
    elseif($i==7)
        $cor = "gray";
    elseif($i==8)
        $cor = "brown";
    echo '<div style="background-color: ' . $cor . '; width: 100px; height: 100px;"></div>';
}