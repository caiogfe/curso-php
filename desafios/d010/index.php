<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 10</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $nasc = "";
        $ano = "";
        $idade = "";
    
    ?>
    <main>
        <h1>Cálculo de Idade</h1>
        <form action="<?=htmlspecialchars($SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idnasc">Em que ano você nasceu?</label>
                <input type="number" name="nasc" id="idnasc">
            </div>
            <div class="campo">
                <label for="idano">Quer saber sua idade em que ano? (atualmente estamos em <strong>2025</strong>)</label>
                <input type="number" name="ano" id="idano">
            </div>
            <input type="submit" value="Qual será minha idade?">
        </form>
    </main>
</body>
</html>