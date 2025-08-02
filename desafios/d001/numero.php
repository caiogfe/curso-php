<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 1 - Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Resultado Final</h1>
        <?php 
            $numero = intval($_GET["numero"] ?? 0);
            $antecessor = $numero - 1;
            $sucessor = $numero + 1;
            echo "<p>O número escolhido foi <strong>$numero</strong><br>
                O seu antecessor é $antecessor<br>
                O seu sucessor é $sucessor</p>";
        ?>
        <button class="voltar" onclick="javascript:window.location.href='index.html'">&#8592; Voltar</button>
    </main>
</body>
</html>