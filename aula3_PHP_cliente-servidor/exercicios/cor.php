<?php

if(isset($_GET['cor'])) {
    $cor = $_GET['cor'];
    
    if($cor != "") {
        echo "<body style='background-color: " . $cor . ";'>";
        echo "</body>";
    
    } else 
        echo "Informe o parâmetro 'cor'!";

} else {
    echo "Informe o parâmetro 'cor'!";
}
