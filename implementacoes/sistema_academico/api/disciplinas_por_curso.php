<?php

require_once(__DIR__ . "/../controller/DisciplinaController.php");

//sleep(10);

// disciplinas_por_curso.php?idCurso=4
$idCurso = 0;
if(isset($_GET['idCurso']))
    $idCurso = $_GET['idCurso'];

$discCont = new DisciplinaController();
$disciplinas = $discCont->listarPorCurso($idCurso);

echo json_encode($disciplinas, 
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);