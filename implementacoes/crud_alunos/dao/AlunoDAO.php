<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Aluno.php");

class AlunoDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }

    public function listar() {
        $sql = "SELECT a.*, 
                    c.nome nome_curso, c.turno turno_curso 
                FROM alunos a
                    JOIN cursos c ON (c.id = a.id_curso)";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    public function inserir(Aluno $aluno) {
        try {
            $sql = "INSERT INTO alunos (nome, idade, estrangeiro, id_curso)
                    VALUES (?, ?, ?, ?)";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([$aluno->getNome(), $aluno->getIdade(), 
                        $aluno->getEstrangeiro(),
                        $aluno->getCurso()->getId()]);
            return NULL;
        } catch(PDOException $e) {
            return $e;
        }
    }

    private function map(array $result) {
        $alunos = array();
        foreach($result as $r) {
            $aluno = new Aluno();
            $aluno->setId($r["id"]);
            $aluno->setNome($r['nome']);
            $aluno->setIdade($r["idade"]);
            $aluno->setEstrangeiro($r['estrangeiro']);
            
            $curso = new Curso();
            $curso->setId($r["id_curso"]);
            $curso->setNome($r["nome_curso"]);
            $curso->setTurno($r["turno_curso"]);
            $aluno->setCurso($curso);

            array_push($alunos, $aluno);
        }
        return $alunos;
    }

}