<?php

require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErro = "";

//Receber os dados do formulário
if(isset($_POST['nome'])) {
    //Usuário já clicou no gravar
    $nome        = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $idade       = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL;
    $estrangeiro = trim($_POST['estrang']) ? trim($_POST['estrang']) : NULL;
    $idCurso     = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL;

    //Criar um objeto Aluno para persistí-lo
    $aluno = new Aluno();
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrangeiro);

    $curso = new Curso();
    $curso->setId($idCurso);
    $aluno->setCurso($curso);
    //print_r($aluno);

    //Chamar o DAO para salvar o objeto Aluno
    $alunoCont = new AlunoController();
    $erros = $alunoCont->inserir($aluno);

    if(! $erros) {
        //Redirecionar para o listar
        header("location: listar.php");
    } else {
        //Converter o array de erros para string
        $msgErro = implode("<br>", $erros);
    }
}

include_once(__DIR__ . "/form.php");
?>