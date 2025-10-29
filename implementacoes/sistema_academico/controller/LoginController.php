<?php

require_once(__DIR__ . "/../service/LoginService.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");

class LoginController {

    private LoginService $loginService;
    private UsuarioDAO $usuarioDAO;

    public function __construct() {
       $this->loginService = new LoginService();
       $this->usuarioDAO = new UsuarioDAO(); 
    }

    public function login($login, $senha) {
        //Validar os dados
        $erros = $this->loginService->validarLogin($login, $senha);

        if(! $erros) {
            $usuario = $this->usuarioDAO->findByLoginSenha($login, $senha);

            if($usuario) {
                //Rotina para salvar os dados do usuário na sessão do PHP
                $this->loginService->salvarUsuarioSessao($usuario);
            } else
                array_push($erros, "Login ou senha inválidos!");  
        }

        return $erros;
    }

    public function logout() {
        $this->loginService->apagarDadosSessao();
    }

    public function getNomeUsuarioLogado() {
        return $this->loginService->getNomeUsuarioLogado();
    }

    public function getUsuarioLogado(): ?Usuario {
        return $this->loginService->getUsuarioLogado();
    }

    public function usuarioEstaLogado() {
        return $this->loginService->usuarioEstaLogado();
    }

}