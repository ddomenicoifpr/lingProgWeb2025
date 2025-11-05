<?php
//Arquivo com a definição da classe TurmaController

require_once(__DIR__ . "/../dao/TurmaDAO.php");
require_once(__DIR__ . "/../model/Turma.php");
require_once(__DIR__ . "/../service/TurmaService.php");

class TurmaController {

    private TurmaDAO $turmaDAO;
    private TurmaService $turmaService;

    public function __construct() {
        $this->turmaDAO = new TurmaDAO(); 
        $this->turmaService = new TurmaService();       
    }

    public function listar() {
        return $this->turmaDAO->list();
    }

    public function buscarPorId(int $id) {
        return $this->turmaDAO->findById($id);
    }

    public function salvar(Turma $turma) {
        $erros = $this->turmaService->validarDados($turma);

        if(! empty($erros))
            return $erros;
        
        $erroBanco = $this->turmaDAO->save($turma); 
        if($erroBanco)
            return array($erroBanco);

        //Se tudo deu certo, retorna um array vazio
        return array();
    }

    public function atualizar(Turma $turma) {
        $erros = $this->turmaService->validarDados($turma);

        if(! empty($erros))
            return $erros;
        
        $erroBanco = $this->turmaDAO->update($turma); 
        if($erroBanco)
            return array($erroBanco);

        //Se tudo deu certo, retorna um array vazio
        return array();
    }

    public function excluirPorId(int $id) {
        $erroBanco = $this->turmaDAO->deleteById($id); 
        if($erroBanco)
            return array($erroBanco);

        //Se tudo deu certo, retorna um array vazio
        return array();
    }

}
