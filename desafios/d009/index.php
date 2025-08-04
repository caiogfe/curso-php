<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 9</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Médias Aritméticas</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idvalor1">1º Valor</label>
                <input type="number" name="valor1" id="idvalor1">
            </div>
            <div class="campo">
                <label for="idpeso1">1º Peso</label>
                <input type="number" name="peso1" id="idpeso1">
            </div>
            <div class="campo">
                <label for="idvalor2">2º Valor</label>
                <input type="number" name="valor2" id="idvalor2">
            </div>
            <div class="campo">
                <label for="idpeso2">2º Peso</label>
                <input type="number" name="peso2" id="idpeso2">
            </div>
            <input type="submit" value="Calcular Médias">
        </form>
    </main>
</body>
</html>