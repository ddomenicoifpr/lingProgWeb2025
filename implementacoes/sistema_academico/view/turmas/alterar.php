<?php 
#Página para alterar um aluno
require_once(__DIR__ . "/../login/validar.php");

require_once(__DIR__ . "/../../controller/TurmaController.php");
require_once(__DIR__ . "/../../model/Turma.php");

$msgErro = null;
$turma = null;
$idCurso = 0; //Utilizado para mater o ID do curso de forma provisória

$turmaCont = new TurmaController();

//Verifica se o formulário foi submetido
if(isset($_POST['ano'])) {
    //Captura os campos for formulário
    //Captura os campos for formulário
    $ano = is_numeric($_POST['ano']) ? $_POST['ano'] : null;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : null;
    $idDisciplina = is_numeric($_POST['disciplina']) ? $_POST['disciplina'] : null;

    //Captura o campo ID para a turma - hidden
    $id = isset($_POST['id']) ? trim($_POST['id']) : 0;

    //Criar o objeto turma
    $turma = new Turma();
    $turma->setId($id); //Seta o ID para alterar
    $turma->setAno($ano);
    if($idDisciplina)
        $turma->setDisciplina(new Disciplina($idDisciplina));
    
    //Chama o controller para atualizar a turma
    $erros = $turmaCont->atualizar($turma);

    if(empty($erros)) {
        header("location: listar.php");
        exit;
    }

    //print_r($erros);
    $msgErro = implode("<br>", $erros);

} else {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? trim($_GET['id']) : 0;

    //Verificar se a turma existe
    $turma = $turmaCont->buscarPorId($id);
    if(! $turma) {
        echo "Turma não encontrada!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }

    $idCurso = $turma->getDisciplina()->getCurso()->getId();
}

include(__DIR__ . "/form.php");