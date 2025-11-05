<?php
#Arquivo com a declaração da classe Turma

require_once(__DIR__ . "/Disciplina.php");

class Turma {

    private int $id;
    private ?int $ano;
    private ?Disciplina $disciplina;

    public function __construct() {
        $this->id = 0;
        $this->disciplina = null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    public function getDisciplina()
    {
        return $this->disciplina;
    }

    public function setDisciplina($disciplina)
    {
        $this->disciplina = $disciplina;

        return $this;
    }
}