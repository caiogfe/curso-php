<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 3 - Resultado 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Conversor de Moeda v1.0</h1>
        <?php 
        //utilizando biblioteca intl (internationalization PHP)
            $valorReal = $_GET["moeda"] ?? 0;
            $valorDolar = $valorReal / 5.57;
            $valorPadrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY); //formata o número para a localidade (brasil no caso) e indica que o tipo será moeda

            echo "<p>Seus " . numfmt_format_currency($valorPadrao, $valorReal, "BRL") . " equivalem a <strong>" . numfmt_format_currency($valorPadrao, $valorDolar, "USD") . "</strong></p>";
        ?>
        <p><strong>*Cotação fixa de R$ 5,57</strong> informada diretamente no código.</p>
        <button class="voltar" onclick="window.location.href='index.html'">Voltar</button>
    </main>
</body>
</html>