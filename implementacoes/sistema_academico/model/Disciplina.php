<?php
#Arquivo com a declaração da classe Disciplina

require_once(__DIR__ . "/Curso.php");

class Disciplina implements JsonSerializable {

    private int $id;
    private ?string $codigo;
    private ?string $nome;
    private ?Curso $curso;

    public function jsonSerialize(): array {
        return array("id" => $this->id,
                     "codigo" => $this->codigo,
                     "nome" => $this->nome);
    }

    public function __construct($id=0) {
        $this->id = $id;
        $this->curso = null;
    }

    public function __toString() {
        return $this->codigo . " - " . $this->nome;
    }

    //GETs e SETs
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCurso()
    {
        return $this->curso;
    }

    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }
}