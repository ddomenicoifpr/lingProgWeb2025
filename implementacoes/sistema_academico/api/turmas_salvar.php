<?php 

require_once(__DIR__ . "/../model/Turma.php");

//Capturar os dados do formulário
$ano     = is_numeric($_POST['ano']) ? $_POST['ano'] : null;
$idCurso = is_numeric($_POST['idCurso']) ? $_POST['idCurso'] : null;
$idDisc  = is_numeric($_POST['idDisc']) ? $_POST['idDisc'] : null;

//Criar o objeto
$turma = new Turma();
$turma->setAno($ano);
$turma->setDisciplina(new Disciplina($idDisc));

print_r($turma);