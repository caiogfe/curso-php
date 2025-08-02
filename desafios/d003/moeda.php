<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 3 - Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Conversor de Moeda v1.0</h1>
        <?php 
            $valorReal = $_GET["moeda"] ?? 0;
            $valorDolar = number_format($valorReal / 5.57, 2, ',', '.');
            $valorRealFormat = number_format($valorReal, 2, ',', '.');
            echo "<p>Seus R\$ $valorRealFormat equivalem a <strong>US\$ $valorDolar*</strong></p>";
        ?>
        <p><strong>*Cotação fixa de R$ 5,57</strong> informada diretamente no código.</p>
        <button class="voltar" onclick="javascript:window.location.href='index.html'">Voltar</button>
    </main>
</body>
</html>