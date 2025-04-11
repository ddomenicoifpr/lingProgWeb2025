<?php

class Pessoa {

    private string $nome;
    private string $sobrenome;
    private int $idade;

    public function __toString()
    {
        $html = "<span style='font-weight: bold;'>Nome completo:</span>";
        $html .= $this->nome . " " . $this->sobrenome;
        $html .= "<br>";

        $html .= "<span style='font-weight: bold;'>Idade:</span>";
        $html .= $this->idade;
        return $html;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function setSobrenome(string $sobrenome): self
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }

    public function setIdade(int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }
}