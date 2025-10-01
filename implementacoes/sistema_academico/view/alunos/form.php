<?php

require_once(__DIR__ . "/../../controller/CursoController.php");

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursos);

include_once(__DIR__ . "/../include/header.php");
?>

<h3><?= $aluno && $aluno->getId() > 0 ? 'Alterar' : 'Inserir' ?> 
        aluno</h3>

<div class="row">

    <div class="col-6">
    
        <form method="POST" action="">

            <div>
                <label for="txtNome" class="form-label">Nome:</label>
                <input type="text" id="txtNome" name="nome"
                    placeholder="Informe o nome" class="form-control"
                    value="<?= $aluno ? $aluno->getNome() : '' ?>">
            </div>

            <div>
                <label for="txtIdade" class="form-label">Idade:</label>
                <input type="number" id="txtIdade" name="idade"
                    placeholder="Informe a idade" class="form-control"
                    value="<?= $aluno ? $aluno->getIdade() : '' ?>">
            </div>

            <div>
                <label for="selEstrang" class="form-label">Estrangeiro:</label>
                <select name="estrang" id="selEstrang" class="form-select">
                    <option value="">----Selecione----</option>
                    <option value="S"
                    <?= $aluno && $aluno->getEstrangeiro() == 'S' ? 'selected' : '' ?> 
                    >Sim</option>
                    <option value="N"
                        <?= $aluno && $aluno->getEstrangeiro() == 'N' ? 'selected' : '' ?>
                    >Não</option>
                </select>
            </div>

            <div>
                <label for="selCurso" class="form-label">Curso:</label>
                <select name="curso" id="selCurso" class="form-select">
                    <option value="">----Selecione----</option>

                    <?php foreach($cursos as $c): ?>
                        <option value="<?= $c->getId() ?>" 
                        
                        <?php
                            if($aluno && $aluno->getCurso() && 
                                $aluno->getCurso()->getId() == $c->getId())
                                echo "selected"; 
                        ?>

                        >
                            <?= $c ?><!-- Chama o toString da classe -->
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="id"
                value="<?= $aluno ? $aluno->getId() : 0 ?>">

            <div class="mt-2">
                <button type="submit" 
                    class="btn btn-success">Gravar</button>
            </div>

        </form>
    </div>

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?= $msgErro ?>
            </div>
        <?php endif; ?>
    </div>

</div> <!-- fecha a linha -->

<div class="mt-2">
    <a href="listar.php" class="btn btn-outline-primary">Voltar</a>
</div>


<?php
    include_once(__DIR__ . "/../include/footer.php");
?>