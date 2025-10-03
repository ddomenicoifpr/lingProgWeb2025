<?php

require_once(__DIR__ . "/../model/Usuario.php");
require_once(__DIR__ . "/../util/config.php");

class LoginService {

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
        session_start();
        $_SESSION[SESSAO_USUARIO_ID] = $usuario->getId();
        $_SESSION[SESSAO_USUARIO_NOME] = $usuario->getNome();
    }

}