<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Dados do Veículo</h2>
    <form method="POST" action="executa.php">
        <input name="modelo" placeholder="Informe o modelo" />
        <br><br>
        <input name="marca" placeholder="Informe a marca" />
        <br><br>
        <select name="combustivel">
            <option value="">--Selecione o combustível---</option>
            <option value="A">Álcool</option>
            <option value="G">Gasolina</option>
            <option value="F">Flex</option>
        </select>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>