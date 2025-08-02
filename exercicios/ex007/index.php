<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulários PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        //caputrando os dados do formulario retroalimentado
        $v1 = (int) ($_GET['valor1'] ?? 0);
        $v2 = (int)($_GET['valor2'] ?? 0);
    ?>
    <main>
        <h1>Somador de Valores</h1>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idvalor1">Valor 1</label>
                <input type="number" name="valor1" id="idvalor1" value="<?=$v1?>">
            </div>
            <div class="campo">
                <label for="idvalor2">Valor 2</label>
                <input type="number" name="valor2" id="idvalor2" value="<?=$v2?>">
            </div>
            <input type="submit" value="Somar">
        </form>
    </main>

        <?php
            function mostrarResultado($v1, $v2) {
                $soma = $v1 + $v2;
                echo "<h2>Resultado da Soma</h2>";
                echo "<p>A soma entre os valores $v1 e $v2 é <strong>igual a $soma</strong></p>";
            }

            if (isset($_GET['valor1']) && isset($_GET['valor2'])): ?>
                <section id="resultado">
                    <?php mostrarResultado($v1, $v2); ?>
                </section>
            <?php endif;
        ?>     
</body>
</html>