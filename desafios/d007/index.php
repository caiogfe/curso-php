<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salário Mínimo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $salarioMinimo = 1518;
        $valorSalario = $_GET['salario'];
        $quantSalario = intdiv($valorSalario, $salarioMinimo);
        $valorRestante = $valorSalario - ($quantSalario * $salarioMinimo);
    ?>
    <main>
        <h1>Informe seu salário</h1>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
            <div class="campo">
                <label for="idsalario">Salário (R$)</label>
                <input type="number" name="salario" id="idsalario">
            </div>
            <p>Considerando o salário mínimo de <strong>R$ 1.518,00</strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <?php 
        echo "R$ $salarioMinimo<br>";
        echo "R$ $valorSalario<br>";
        echo "$quantSalario salários mínimos<br>";
        echo "R$ $valorRestante<br>";
    ?>
</body>
</html>