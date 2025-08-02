<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <?php 
            $valorDividendo = (int)($_GET["dividendo"] ?? 0);
            $valorDivisor = (int)($_GET["divisor"] ?? 1);
        ?>
        <h1>Anatomia de uma Divisão</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="iddividendo">Dividendo</label>
                <input type="number" name="dividendo" id="iddividendo" value="<?= $valorDividendo ?>">
            </div>
            <div class="campo">
                <label for="iddivisor">Divisor</label>
                <input type="number" name="divisor" id="iddivisor" value="<?= $valorDivisor ?>" min="1">
            </div>
            <input type="submit" value="Analisar">
        </form>
    </main>
    <?php 
        function divisao($valorDividendo, $valorDivisor) {
            if ($valorDivisor === 0) {
                echo "<p id='res-erro'>ERRO: Divisão por zero não é permitida.</p>";
                return;
            }
            $valorQuociente = intdiv($valorDividendo, $valorDivisor);
            $valorResto = $valorDividendo % $valorDivisor;
            echo "<div id='res-dividendo'>$valorDividendo</div>";
            echo "<div id='res-divisor'>$valorDivisor</div>";
            echo "<div id='res-resto'>$valorResto</div>";
            echo "<div id='res-quociente'>$valorQuociente</div>";
        }
    if(isset($_GET['dividendo']) && isset($_GET['divisor'])): ?>
    <section id="resultado">
        <h2>Estrutura da Divisão</h2>
        <?php divisao($valorDividendo, $valorDivisor);?>
    </section>
    <?php endif;
    ?>
</body>
</html>