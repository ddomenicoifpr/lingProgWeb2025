<?php

require_once(__DIR__ . "/../../controller/CursoController.php");

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursos);

include_once(__DIR__ . "/../include/header.php");
?>

<h3>Inserir aluno</h3>

<form method="POST" action="">

    <div>
        <label for="txtNome">Nome:</label>
        <input type="text" id="txtNome" name="nome"
            placeholder="Informe o nome">
    </div>

    <div>
        <label for="txtIdade">Idade:</label>
        <input type="number" id="txtIdade" name="idade"
            placeholder="Informe a idade">
    </div>

    <div>
        <label for="selEstrang">Estrangeiro:</label>
        <select name="estrang" id="selEstrang">
            <option value="">----Selecione----</option>
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
    </div>

    <div>
        <label for="selCurso">Curso:</label>
        <select name="curso" id="selCurso">
            <option value="">----Selecione----</option>

            <?php foreach($cursos as $c): ?>
                <option value="<?= $c->getId() ?>">
                    <?= $c ?><!-- Chama o toString da classe -->
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <button type="submit">Gravar</button>
    </div>

</form>

<div style="color: red;">
    <?= $msgErro ?>
</div>

<div>
    <a href="listar.php">Voltar</a>
</div>


<?php
    include_once(__DIR__ . "/../include/footer.php");
?>