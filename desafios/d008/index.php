<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 8</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $valorNumero = filter_input(INPUT_GET, 'numero', FILTER_VALIDATE_INT);
        $raizQuadrada = sqrt($valorNumero); 
        $raizCubica = pow($valorNumero, 1/3);
    ?>
    <main>
        <h1>Informe um número</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idnumero">Número</label>
                <input type="number" name="numero" id="idnumero" min="0" value="<?=htmlspecialchars($valorNumero)?>">
            </div>
            <input type="submit" value="Calcular Raízes">
        </form>
    </main>
    <?php
        if ($valorNumero !== false && $valorNumero >= -1): ?>
            <section>
                <h2>Resultado Final</h2>
                <p>Analisando o <strong>número <?=$valorNumero?></strong>, temos: </p>
                <ul>
                    <li> A sua raiz quadrada é <strong><?=number_format($raizQuadrada, 3, ',', '.')?></strong>
                    <li> A sua raiz cúbica é <strong> <?=number_format($raizCubica, 3, ',', '.')?></strong>
                </ul>
            </section>
        <?php elseif(isset($_GET['numero'])): ?>
            <section id="erro">
                <h2>Cálculo Incompleto</h2>
                <p>Por favor, informe um número válido.</p>
            </section>
        <?php endif ?>
</body>
</html>