<?php 
//Código PHP para login

$login = "";
if(isset($_POST['login']))
    $login = $_POST['login'];

$senha = "";
if(isset($_POST['senha']))
    $senha = $_POST['senha'];

$loginOK = false;
if($login == 'ifpr' and $senha == 'tds') 
    $loginOK = true;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do IFPR</title>
</head>
<body>
    <?php if($loginOK): ?>
        <h2>Bem vindo ao TDS</h2>
        <a href="login.php">Sair</a>
    
    <?php else: ?>
        <h1>Página de login</h1>
        <form method="POST" action="">
            
            <input type="text" name="login" placeholder="Informe o login" />

            <br><br>

            <input type="password" name="senha" placeholder="Informe a senha" />

            <br><br>

            <input type="submit" value="Logar">
        </form>
    <?php endif; ?>
</body>
</html>