<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre seu filme</title>
</head>
<body>
    <h1>Cadastre seu filme</h1>

    <form method="POST" action="filme_card.php">
        <!-- nome -->
        <input type="text" name="nome" placeholder="Informe o nome do filme"><br><br>

        <!-- diretor -->
        <input type="text" name="diretor" placeholder="Informe o diretor do filme"><br><br>

        <!-- ano -->
        <input type="number" name="ano" placeholder="Informe o ano do filme"><br><br>

        <!-- foto -->
        <input type="text" name="link_foto" placeholder="Informe a foto filme"><br><br>

        <button>Gerar card</button>
    </form>   
</body>
</html>