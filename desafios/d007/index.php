<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 7</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $salarioMinimo = 1518;
        $valorSalario = filter_input(INPUT_GET, 'salario', FILTER_VALIDATE_FLOAT);
        $quantSalario = intdiv($valorSalario, $salarioMinimo);
        $valorRestante = $valorSalario - ($quantSalario * $salarioMinimo);
        $valorPadrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    ?>
    <main>
        <h1>Informe seu salário</h1>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
            <div class="campo">
                <label for="idsalario">Salário (R$)</label>
                <input type="number" name="salario" id="idsalario" step="0.01" value="<?= htmlspecialchars($valorSalario)?>" min="1">
            </div>
            <p>Considerando o salário mínimo de <strong>R$ 1.518,00</strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <?php 
        if($valorSalario !== false && $valorSalario > 0): ?>
            <section>
                <h2>Resultado Final</h2>
                <?php 
                    echo "<p>Quem recebe um salário de " . numfmt_format_currency($valorPadrao, $valorSalario, 'BRL') . " ganha <strong> $quantSalario salários mínimos + " . numfmt_format_currency($valorPadrao, $valorRestante, 'BRL') . "</strong>.</p>";
                ?>
            </section>
        <?php elseif(isset($_GET['salario'])): ?>
            <section id="erro">
            <h2>Resultado Final</h2>
            <?= "<p>Por favor, informe um número válido.</p>" ?>
            </section>
        <?php endif;
    ?>
</body>
</html>