<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("util/Conexao.php");

$con = Conexao::getConexao();
//print_r($con);

//Buscar os livros já salvos na base de dados
$sql = "SELECT * FROM livros";
$stm = $con->prepare($sql);
$stm->execute();
$livros = $stm->fetchAll();
//echo "<pre>" . print_r($livros, true) . "</pre>";

$msgErro = "";
$titulo = "";
$autor = "";
$genero = "";
$qtdPag = "";

//Verificar se o usuário já clicou no Gravar
if(isset($_POST["titulo"])) {
    //Obter os valores digitados pelo usuário
    $titulo = trim($_POST["titulo"]);
    $autor  = trim($_POST["autor"]);
    $genero = $_POST["genero"];
    $qtdPag = $_POST["paginas"];

    //Validar os dados
    $erros = array();
    if(! $titulo)
        array_push($erros, 'Informe o título!');
    else if(strlen($titulo) < 3 || strlen($titulo) > 50)
        array_push($erros, 'O título deve ter entre 3 e 50 caracteres!');
    else {
        $sql = "SELECT id FROM livros WHERE titulo = ?";
        $stm = $con->prepare($sql);
        $stm->execute([$titulo]);
        $result = $stm->fetchAll();

        if(count($result) > 0)
            array_push($erros, "Já existe um livro com este título!");
    }
    
    if(! $autor)
        array_push($erros, 'Informe o autor!');
    
    if(! $genero)
        array_push($erros, 'Informe o gênero!');
    
    if($qtdPag == "")
        array_push($erros, 'Informe a quantidade de páginas!');
    else if($qtdPag <= 0)
        array_push($erros, 'A quantidade de páginas deve ser maior que 0!');

    if(count($erros) == 0) {
        //Inserir as informações na base de dados
        $sql = "INSERT INTO livros (titulo, autor, genero, qtd_paginas) 
                VALUES (?, ?, ?, ?)";
        $stm = $con->prepare($sql);
        $stm->execute([$titulo, $autor, $genero, $qtdPag]);

        //Redirecionar para a mesma página a fim de limpar o buffer do navegodor
        header("location: index.php");
    } else {
        $msgErro = implode("<br>", $erros);
    }
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>
<body>
    <h1>Listagem</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Páginas</th>
            <th>Excluir</th>
        </tr>

        <?php foreach($livros as $l): ?>
            <tr>
                <td><?= $l["id"] ?></td>
                <td><?= $l["titulo"] ?></td>
                <td><?= $l["autor"] ?></td>
                <td>
                    <?php 
                        if($l["genero"] == 'D')
                            echo "Drama";
                        else if($l["genero"] == 'R') 
                            echo "Romance";
                        else if($l["genero"] == 'F') 
                            echo "Ficção";
                        else
                            echo "Outro";
                    ?>
                </td>
                <td><?= $l["qtd_paginas"] ?></td>
                <td>
                    <a href="excluir.php?id=<?= $l["id"] ?>"
                        onclick="return confirm('Confirma a exclusão?');">
                        Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


    <h1>Formulário</h1>

    <!--form action="" method="POST" 
            onsubmit="return validarCampos();"-->
    <form action="" method="POST" >
        <div style="margin-bottom: 10px;">
            <label for="titulo">Título: </label>
            <input type="text" name="titulo" id="titulo"
                value="<?= $titulo ?>" />
        </div>

        <div style="margin-bottom: 10px;">
            <label for="autor">Autor: </label>
            <input type="text" name="autor" id="autor" 
                value="<?= $autor ?>" />
        </div>

        <div style="margin-bottom: 10px;">
            <label for="genero">Gênero: </label>
            <select name="genero" id="genero">
                <option value="">---Selecione---</option>
                <option value="D" 
                    <?= ($genero == 'D' ? 'selected' : '') ?> >
                    Drama</option>
                <option value="F"
                    <?= ($genero == 'F' ? 'selected' : '') ?> >
                    Ficção</option>
                <option value="R" 
                    <?= ($genero == 'R' ? 'selected' : '') ?> >
                    Romance</option>
                <option value="O" 
                    <?= ($genero == 'O' ? 'selected' : '') ?> >
                    Outro</option>
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="paginas">Páginas: </label>
            <input type="number" name="paginas" id="paginas"
                 value="<?= $qtdPag ?>" />
        </div>

        <div style="margin-bottom: 10px;">
            <button type="submit">Gravar</button>
        </div>
    </form>

    <div id="divErro" style="color: red;">
        <?= $msgErro ?>
    </div>
    
    <script src="js/validacao.js"></script>
</body>
</html>