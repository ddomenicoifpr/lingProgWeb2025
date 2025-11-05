<?php 
#Página para excluir uma turma
require_once(__DIR__ . "/../login/validar.php");

require_once(__DIR__ . "/../../controller/TurmaController.php");

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? trim($_GET['id']) : 0;

//Verificar se a turma existe
$turmaCont = new TurmaController();
$turma = $turmaCont->buscarPorId($id);

if(! $turma) {
    echo "Turma não encontrada!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

//Excluir
$erros = $turmaCont->excluirPorId($id);

//Redirecionar para a lista de turmas
header("location: listar.php");
