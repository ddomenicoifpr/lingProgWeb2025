<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página com formulário</title>
</head>
<body>
    <h1>Cadastro de escola</h1>

    <form method="POST" action="form_exec.php">
        <input type="text" placeholder="Informe o nome"
            name="nomeEscola">

        <br><br>

        <select name="nivel">
            <option value="">---Selecione o nível---</option>
            <option value="I">Infantil</option>
            <option value="F">Fundamental</option>
            <option value="M">Médio</option>
        </select>

        <br><br>

        <input type="submit" value="Enviar" />

    </form>
    
</body>
</html>