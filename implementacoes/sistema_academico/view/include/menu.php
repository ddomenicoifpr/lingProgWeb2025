<?php

require_once(__DIR__ . "/../../controller/LoginController.php");

$loginCont = new LoginController();
$nome = $loginCont->getNomeUsuarioLogado();
//echo $nome;

?>
<nav class="navbar navbar-expand-md bg-light px-3">
    <a class="navbar-brand" href="<?= URL_BASE ?>">Sistema Acadêmico</a>

    <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav ms-auto">
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"
                    id="navDropDown" data-bs-toggle="dropdown">Cadastros</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" 
                        href="<?= URL_BASE ?>/view/alunos/listar.php">Alunos</a>
                    <a class="dropdown-item" 
                        href="<?= URL_BASE ?>/view/turmas/listar.php">Turmas</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"
                    id="navDropDown" data-bs-toggle="dropdown"><?= $nome ?></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" 
                        href="<?= URL_BASE ?>/view/perfil/perfil.php">Perfil</a>
                    <a class="dropdown-item" 
                        href="<?= URL_BASE ?>/view/login/sair.php">Sair</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Sobre</a>
            </li>
        </ul>
    </div>
</nav>