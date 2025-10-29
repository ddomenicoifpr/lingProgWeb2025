<?php

require_once(__DIR__ . "/../model/Usuario.php");
require_once(__DIR__ . "/../util/config.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");

class LoginService {

    private UsuarioDAO $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function validarLogin(?string $login, ?string $senha) {

        $erros = array();

        //Adicionar erros se $login e $senha não estão preenchidos
        if(! $login)
            array_push($erros, "Informe o login!");

        if(! $senha)
            array_push($erros, "Informe a senha!");

        return $erros;
    }

    public function salvarUsuarioSessao(Usuario $usuario) {
        $this->iniciarSessao();
        $_SESSION[SESSAO_USUARIO_ID] = $usuario->getId();
        $_SESSION[SESSAO_USUARIO_NOME] = $usuario->getNome();
    }

    public function apagarDadosSessao() {
        $this->iniciarSessao();

        //Remover os dados da sessão
        session_unset();

        //Destroi a sessão
        session_destroy();
    }

    public function getNomeUsuarioLogado() {
        if($this->usuarioEstaLogado())        
            return $_SESSION[SESSAO_USUARIO_NOME];

        return "(Não autenticado)";
    }

    public function getUsuarioLogado(): ?Usuario {
        if($this->usuarioEstaLogado())
            return $this->usuarioDAO->findById($_SESSION[SESSAO_USUARIO_ID]); 

        return null;
    }

    public function usuarioEstaLogado() {
        $this->iniciarSessao();

        if(isset($_SESSION[SESSAO_USUARIO_ID]))
            return true;

        return false;
    }

    private function iniciarSessao() {
        if(session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

}