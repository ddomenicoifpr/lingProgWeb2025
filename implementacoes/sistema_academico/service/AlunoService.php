<?php

require_once(__DIR__ . "/../model/Aluno.php");

class AlunoService {

    public function validarAluno(Aluno $aluno) {
        $erros = array();

        if(! $aluno->getNome()) {
            array_push($erros, "Informe o nome do aluno!");
        }

        if(! $aluno->getIdade()) {
            array_push($erros, "Informe a idade do aluno!");
        }

        if(! $aluno->getEstrangeiro()) {
            array_push($erros, "Informe se o aluno é estrangeiro!");
        }

        if(! $aluno->getCurso()) {
            array_push($erros, "Informe o curso do aluno!");
        }

        return $erros;
    }
}