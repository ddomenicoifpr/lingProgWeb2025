<?php

class Curso {

    private ?int $id;
    private ?string $nome;
    private ?string $turno;

    public function __toString() {
        return $this->nome . ' (' . 
            $this->getTurnoTexto() . ")";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getTurno(): ?string
    {
        return $this->turno;
    }

     public function getTurnoTexto(): string
    {
        if($this->turno == "M")
            return "Matutino";

        if($this->turno == "V")
            return "Vespertino";

        if($this->turno == "N")
            return "Noturno";

        return "";
    }

    public function setTurno(?string $turno): self
    {
        $this->turno = $turno;

        return $this;
    }
}