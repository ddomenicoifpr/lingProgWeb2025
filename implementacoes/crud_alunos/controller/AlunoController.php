<?php

require_once(__DIR__ . "/../dao/AlunoDAO.php");
require_once(__DIR__ . "/../model/Aluno.php");

class AlunoController {

    private AlunoDAO $alunoDAO;

    public function __construct() {
        $this->alunoDAO = new AlunoDAO();        
    }

    public function listar() {
        $lista = $this->alunoDAO->listar();
        return $lista;
    }

    public function inserir(Aluno $aluno) {
        $erros = array();
        
        $erro = $this->alunoDAO->inserir($aluno);
        if($erro) {
            array_push($erros, "Erro ao salvar o aluno!");
            if(AMB_DEV)
                array_push($erros, $erro->getMessage());
        }

        return $erros;
    }

}