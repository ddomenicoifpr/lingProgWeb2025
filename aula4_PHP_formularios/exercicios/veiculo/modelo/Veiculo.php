<?php

class Veiculo {

    private string $modelo;
    private string $marca;
    private string $combustivel;

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getCombustivel(): string
    {
        return $this->combustivel;
    }

    public function getCombustivelCompleto() {
        if($this->combustivel == 'A')
            return "Álcool";
        else if($this->combustivel == 'G')
            return "Gasolina";
        else
            return "Flex";        
    }

    public function setCombustivel(string $combustivel): self
    {
        $this->combustivel = $combustivel;

        return $this;
    }
}