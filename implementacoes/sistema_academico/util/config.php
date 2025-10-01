<?php

//Mostrar erros do PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Configurar essas variáveis de acordo com o seu ambiente
define("DB_HOST", "mysql-server");
define("DB_NAME", "db_alunos");
define("DB_USER", "root");
define("DB_PASSWORD", "root");

//Configuração do ambiente
define("AMB_DEV", true);
//define("AMB_DEV", false);

//Configurar variáveis para a sessão do usuário (login)
define("SESSAO_USUARIO_ID", "USUARIOID");
define("SESSAO_USUARIO_NOME", "USUARIONOME");