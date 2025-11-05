<?php
#Classe DAO para o model de Disciplina

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Disciplina.php");

class DisciplinaDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }

    public function listByCurso(int $idCurso) {
        $sql = "SELECT d.*, c.nome AS nome_curso, c.turno AS turno_curso" . 
               " FROM disciplinas d" .
               " JOIN cursos c ON (c.id = d.id_curso)" .
               " WHERE d.id_curso = ?" . 
               " ORDER BY d.nome";
        $stm = $this->conexao->prepare($sql);    
        $stm->execute([$idCurso]);
        $result = $stm->fetchAll();

        return $this->mapBancoParaObjeto($result);
    }

    //Converte do formato Banco (array associativo) para Objeto
    private function mapBancoParaObjeto($result) {
        $disciplinas = array();
        foreach ($result as $reg) {
            $disciplina = new Disciplina();
            $disciplina->setId($reg['id']);
            $disciplina->setCodigo($reg['codigo']);
            $disciplina->setNome($reg['nome']);
            
            $curso = new Curso();
            $curso->setId($reg['id_curso'])
                ->setNome($reg['nome_curso'])
                ->setTurno($reg['turno_curso']);            
            $disciplina->setCurso($curso);
            array_push($disciplinas, $disciplina);
        }

        return $disciplinas;
    }

}