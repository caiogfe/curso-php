<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 5 - Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Analisador de Número Real</h1>
        <?php 
            $numReal = $_GET["numero"] ?? 0;//pegar o número do form
            $numInt = (int)$numReal;
            $numFrac = abs($numReal - $numInt);
            echo "<p>Analisando o número <strong>" . number_format($numReal, 3, ',', '.') . "</strong> informado pelo usuário: </p>";
            echo "<ul>
                    <li>A parte inteira do número é <strong>" . number_format($numInt, 0, ',', '.') . "</strong></li>
                    <li>A parte fracionária do número é <strong>" . number_format($numFrac, 3, ',', '.') . "</strong></li>
                </ul>"
        ?>
        <button class="voltar" onclick="window.location.href='index.html'">Voltar</button>
    </main>
</body>
</html>