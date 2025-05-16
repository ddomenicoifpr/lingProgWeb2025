<?php

class Conexao {

    private static $conn = null;

    public static function getConexao() {
        if(self::$conn == null) {
            $opcoes = array(
                //Define o charset da conexão
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                //Define o tipo do erro como exceção
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                //Define o tipo do retorno das consultas
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
            
            self::$conn = 
                new PDO("mysql:host=mysql-server;dbname=db_biblioteca", 
                        "root", 
                        "root", 
                        $opcoes);
        }

        return self::$conn;
    }

}