<?php

require_once(__DIR__ . "/../dao/CursoDAO.php");

class CursoController {

    private CursoDAO $cursoDAO;

    public function __construct() {
        $this->cursoDAO = new CursoDAO;
    }

    public function listar() {
        return $this->cursoDAO->listar();
    }

}