<?php

class Filme {

    private string $nome;
    private string $diretor;
    private int $ano;
    private string $foto;

    public function getCard() {
        $card = "<div style='border: solid 1px; width: 300px; margin-top: 20px;'>";
        $card .= $this->nome . "<br>";
        $card .= $this->diretor . "<br>";
        $card .= $this->ano . "<br>";
        $card .= "<img style='width: 100%; height: auto;' src='" . $this->foto . "' /><br>";
        $card .= "</div>";

        return $card;
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

    public function getDiretor(): string
    {
        return $this->diretor;
    }

    public function setDiretor(string $diretor): self
    {
        $this->diretor = $diretor;

        return $this;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function setAno(int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }
}