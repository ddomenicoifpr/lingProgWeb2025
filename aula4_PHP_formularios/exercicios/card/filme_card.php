<?php
//Capturar os valores da superglobal
require_once("modelo/Filme.php");

if(! isset($_POST['nome'])) {
    echo "Dados insuficientes para gerar o Card!!";
    exit;
}

$ano = is_numeric($_POST['ano']) ? $_POST['ano'] : 0;

$filme = new Filme();
$filme->setNome($_POST['nome'])
    ->setDiretor($_POST['diretor'])
    ->setAno($ano)
    ->setFoto($_POST['link_foto']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filme card</title>
</head>

<body>

    <!-- Saída utilizando a short tag do PHP (não requer o echo) -->
    <?= $filme->getCard() ?>

    <br><br>
    <a href="filme_formulario.php">Gerar novo card</a>

</body>

</html>