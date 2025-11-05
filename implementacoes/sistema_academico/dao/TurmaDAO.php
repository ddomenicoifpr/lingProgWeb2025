<?php
#Classe DAO para o model de Turma

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Disciplina.php");
require_once(__DIR__ . "/../model/Turma.php");
require_once(__DIR__ . "/../model/Curso.php");

class TurmaDAO {

    private const SQL_TURMA = "SELECT t.*, d.codigo AS disc_codigo, d.nome AS disc_nome, d.id_curso AS disc_id_curso," .
                                     " c.nome AS curso_nome, c.turno AS curso_turno" .
                              " FROM turmas t". 
                              " JOIN disciplinas d ON (d.id = t.id_disciplina)" .
                              " JOIN cursos c ON (c.id = d.id_curso)";

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }

    public function list() {
        $sql = TurmaDAO::SQL_TURMA . 
                " ORDER BY t.ano";
        $stm = $this->conexao->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapBancoParaObjeto($result);
    }

    public function findById(int $id) {
        $sql = TurmaDAO::SQL_TURMA . 
                " WHERE t.id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto Turma
        $alunos = $this->mapBancoParaObjeto($result);

        if(count($alunos) == 1)
            return $alunos[0];
        elseif(count($alunos) == 0)
            return null;

        die("TurmaDAO.findById - Erro: mais de uma turma".
                " encontrado para o ID " . $id);
    }
    
    public function save(Turma $turma) {
        $sql = "INSERT INTO turmas (ano, id_disciplina)".
            " VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);
        
        try {
            $stmt->execute([$turma->getAno(), $turma->getDisciplina()->getId()]);
        } catch (PDOException $e) {
            return "Erro ao perisitir os dados na base de dados.";
        }

        return null;
    }

    public function update(Turma $turma) {
        $sql = "UPDATE turmas SET ano = ?, id_disciplina = ?".
            " WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        
        try {
            $stmt->execute([$turma->getAno(), $turma->getDisciplina()->getId(),
                            $turma->getId()]);
        } catch (PDOException $e) {
            return "Erro ao perisitir os dados na base de dados.";
        }

        return null;
    }

    public function deleteById(int $id) {
        $sql = "DELETE FROM turmas WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        
        try {
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            return "Erro ao perisitir os dados na base de dados.";
        }

        return null;
    }
    
    private function mapBancoParaObjeto($result) {
        $turmas = array();
        foreach ($result as $reg) {
            $turma = new Turma();
            $turma->setId($reg['id']);
            $turma->setAno($reg['ano']);

            $disc = new Disciplina();
            $disc->setId($reg['id_disciplina']);
            $disc->setCodigo($reg['disc_codigo']);
            $disc->setNome($reg['disc_nome']);

            $curso = new Curso();
            $curso->setId($reg['disc_id_curso']);
            $curso->setNome($reg['curso_nome']);
            $curso->setTurno($reg['curso_turno']);
            $disc->setCurso($curso);

            $turma->setDisciplina($disc);

            array_push($turmas, $turma);
        }

        return $turmas;
    }
    
}