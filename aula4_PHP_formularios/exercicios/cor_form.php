<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cor</title>
</head>
<body>
    <h1>Formulário de cor</h1>

    <form method="POST" action="cor_exec.php">
        <!-- 1- Criar o campo SELECT para a cor -->
        <select name="cor">
            <option value="">---Selecione a cor---</option>
            <option style="background-color: Tomato;" value="Tomato">Tomato</option>
            <option style="background-color: Orange;" value="Orange">Orange</option>
            <option style="background-color: DodgerBlue;" value="DodgerBlue">DodgerBlue</option>
            <option style="background-color: MediumSeaGreen;" value="MediumSeaGreen">MediumSeaGreen</option>
        </select>


        <!-- 2- Criar o BOTÃO para submeter o formulário -->
        <button>Enviar</button>

    </form>
    
</body>
</html>