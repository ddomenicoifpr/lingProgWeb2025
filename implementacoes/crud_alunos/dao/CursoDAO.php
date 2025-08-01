<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Curso.php");

class CursoDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }
    
    public function listar() {
        $sql = "SELECT * FROM cursos ORDER BY nome";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $resultado = $stm->fetchAll();

        $cursos = $this->map($resultado);
        return $cursos;
    }

    private function map($resultado) {
        $cursos = array();
        foreach($resultado as $r) {
            $curso = new Curso();
            $curso->setId($r['id']);
            $curso->setNome($r['nome']);
            $curso->setTurno($r['turno']);

            array_push($cursos, $curso);
        }

        return $cursos;        
    }

}