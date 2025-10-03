<?php
#Página com o formulário de login
require_once(__DIR__ . "/../../controller/LoginController.php");

$msgErro = "";
$login = "";
$senha = "";

//Rotina para logar
if(isset($_POST['login'])) {
    $login = trim($_POST['login']) ? trim($_POST['login']) : NULL;
    $senha = trim($_POST['senha']) ? trim($_POST['senha']) : NULL;

    $loginCont = new LoginController();
    $erros = $loginCont->login($login, $senha);

    if(! $erros) {
        //Deu certo o login
        header("location: ../../index.php");

    } else {
        $msgErro = implode("<br>", $erros);
    }

}



//Inclusão do HTML do header
include_once(__DIR__ . "/../include/header.php");
?>

<div class="container">
    <div class="row mt-5">
        <h3 class="col-12">Sistema acadêmico</h3>
    </div>

    <div class="row">
        <div class="col-6 alert alert-info">
            <form name="frmLogin" method="POST">
                
                <div>
                    <label class="form-label" for="txtLogin">Login:</label>
                    <input class="form-control" type="text" id="txtLogin" 
                        name="login"
                        maxlength="15" value="<?= $login ?>" />
                </div>

                <div>
                    <label class="form-label" for="txtSenha">Senha:</label>
                    <input class="form-control" type="password" id="txtSenha" 
                        name="senha"
                        maxlength="15" value="<?= $senha ?>" />
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Logar</button>
                </div>
            </form>
        </div>

        <div class="col-6">
            <?php if ($msgErro): ?>
                <div id="msgErro" class="alert alert-danger"><?= $msgErro ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
    include_once(__DIR__ . "/../include/footer.php");
?>