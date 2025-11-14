<?php
#Página com o formulário de alunos

//Inclui a página que valida se o usuário está logado

include_once(__DIR__ . "/../login/validar.php");

//Inclui o HEADER
require_once(__DIR__ . "/../include/header.php");

//Inclusão do Menu
include_once(__DIR__ . "/../include/menu.php");

require_once(__DIR__ . "/../../controller/CursoController.php");

//Lista de curso para carregar o combo
$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
?>

<span id="confUrlBase" 
        data-url-base="<?= URL_BASE ?>"></span>

<h2><?php echo (!$turma || $turma->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Turma</h2>

<div class="row mb-3">
    <div class="col-6">
        <form name="frmCadastroTurma" method="POST" >
            <div>
                <label for="txtAno" class="form-label">Ano:</label>
                <input type="number" id="txtAno" name="ano" 
                    style="width: 150px;" class="form-control"
                    value="<?php echo ($turma != null ? $turma->getAno() : ''); ?>" />
            </div>

            <div>
                <label for="selCurso" class="form-label">Curso:</label>
                <select id="selCurso" name="curso" class="form-control"
                    onchange="carregarDisciplinas()">
                    <option value="0">---Selecione---</option>
                    <?php foreach($cursos as $c): ?>
                        <option value="<?= $c->getId() ?>"
                            <?php echo (($idCurso == $c->getId()) ? 'selected' : ''); ?>
                        >
                        
                        <?= $c ?></option>
                    <?php endforeach; ?>
                </select>        
            </div>

            <div>
                <label for="selDisciplina" class="form-label">Disciplina:</label>
                <select id="selDisciplina" name="disciplina" class="form-control" 
                    idSelecionado="<?php echo ($turma && $turma->getDisciplina() ? $turma->getDisciplina()->getId() : '0'); ?>" >
                </select>        
            </div>

            <input type="hidden" name="id" 
                value="<?php echo ($turma ? $turma->getId() : 0); ?>" />

            <button type="submit" class="btn btn-success mt-3">Gravar</button>
            
            <?php if(! $turma || $turma->getId() <= 0): ?> 
                <button type="button" class="btn btn-warning mt-3"
                    onclick="salvarTurma()" >
                    Gravar AJAX
                </button>
            <?php endif; ?>
        </form>
    </div>

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?php echo $msgErro; ?>
            </div>
        <?php endif; ?>
        
        <div id="divMsgErro" class="alert alert-danger" style="display: none;">
            
        </div>
    </div> 
</div>

<div>
    <a href="listar.php" class="btn btn-outline-primary">Voltar</a>
</div>


<script src="js/turma.js"></script>

<?php 
//Inclui o FOOTER
require_once(__DIR__ . "/../include/footer.php");
?>

