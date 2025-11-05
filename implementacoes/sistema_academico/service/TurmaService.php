<?php
#Arquivo com a declaração da classe service para Turma

require_once(__DIR__ . "/../model/Turma.php");

class TurmaService {

    public function validarDados(Turma $turma) {
        $erros = array();

        //Validar ano
        if(! $turma->getAno())
            array_push($erros, "O campo [Ano] é obrigatório.");

        //Valida o valor do ano
        if($turma->getAno() && $turma->getAno() < 2000)
            array_push($erros, "O campo [Ano] deve ser maior que 2000.");

        //Validar disciplina
        if(! $turma->getDisciplina() || ! $turma->getDisciplina()->getId())
            array_push($erros, "O campo [Disciplina] é obrigatório.");

        return $erros;
    }

}