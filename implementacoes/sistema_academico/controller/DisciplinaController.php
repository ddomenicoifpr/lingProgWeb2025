<?php
#Classe Controller para o model de Disciplina

require_once(__DIR__ . "/../dao/DisciplinaDAO.php");

class DisciplinaController {

    public function listarPorCurso(int $idCurso) {
        $disciplinaDAO = new DisciplinaDAO();

        return $disciplinaDAO->listByCurso($idCurso);
    }

}