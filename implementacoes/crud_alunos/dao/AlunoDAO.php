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
                    JOIN cursos c ON (c.id = a.id_curso)
                ORDER BY a.nome";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    public function buscarPorId(int $id) {
        $sql = "SELECT a.*, 
                    c.nome nome_curso, c.turno turno_curso 
                FROM alunos a
                    JOIN cursos c ON (c.id = a.id_curso)
                WHERE a.id = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $alunos = $this->map($result);

        if(count($alunos) > 0)
            return $alunos[0];
        else
            return NULL;
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

    public function alterar(Aluno $aluno) {
        try {
            $sql = "UPDATE alunos SET nome = ?, idade = ?,
                        estrangeiro = ?, id_curso = ?
                    WHERE id = ?";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([
                $aluno->getNome(), $aluno->getIdade(),
                $aluno->getEstrangeiro(), $aluno->getCurso()->getId(),
                $aluno->getId()
            ]);
            return NULL;
        } catch(PDOException $e) {
            return $e;
        }
    }

    public function excluirPorId(int $id) {
        try {
            $sql = "DELETE FROM alunos 
                    WHERE id = :id";
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue("id", $id);
            $stm->execute();
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