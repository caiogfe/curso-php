<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 9</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $valor1 = filter_input(INPUT_GET, 'valor1', FILTER_VALIDATE_INT);
        $peso1 = filter_input(INPUT_GET, 'peso1', FILTER_VALIDATE_INT);
        $valor2 = filter_input(INPUT_GET, 'valor2', FILTER_VALIDATE_INT);
        $peso2 = filter_input(INPUT_GET, 'peso2', FILTER_VALIDATE_INT);
        $valoresTotal = [$valor1, $valor2];
        $mediaSimples = array_sum($valoresTotal) / count($valoresTotal);
        function mediaPonderada($valor1, $peso1, $valor2, $peso2) {
            $pesosTotal = $peso1 + $peso2;
            if ($pesosTotal == 0) {
                return null;
            }
            return ($valor1 * $peso1 + $valor2 * $peso2) / $pesosTotal;
        }
    ?>
    <main>
        <h1>Médias Aritméticas</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idvalor1">1º Valor</label>
                <input type="number" name="valor1" id="idvalor1" value="<?=htmlspecialchars($valor1)?>">
            </div>
            <div class="campo">
                <label for="idpeso1">1º Peso</label>
                <input type="number" name="peso1" id="idpeso1" value="<?=htmlspecialchars($peso1)?>">
            </div>
            <div class="campo">
                <label for="idvalor2">2º Valor</label>
                <input type="number" name="valor2" id="idvalor2" value="<?=htmlspecialchars($valor2)?>">
            </div>
            <div class="campo">
                <label for="idpeso2">2º Peso</label>
                <input type="number" name="peso2" id="idpeso2" value="<?=htmlspecialchars($peso2)?>">
            </div>
            <input type="submit" value="Calcular Médias">
        </form>
    </main>
        <?php if($valor1 !== false && $valor2 !== false && $peso1 !== false && $peso2 !== false): ?>
        <?php $mediaPonderada = mediaPonderada($valor1, $peso1, $valor2, $peso2);?>
        <section>
            <h2>Resultado Final</h2>
            <p>Analisando os valores <?="$valor1 e $valor2:"?></p>
            <ul>
                <li>A <strong>Média Aritmética Simples</strong> entre os valores é igual a <?=number_format($mediaSimples, 2, ",", ".")?></li>
                <li>A <strong>Média Aritmética Ponderada</strong> com pesos <?="$peso1 e $peso2 é igual a " . number_format($mediaPonderada, 2, ",", ".")?></li>
            </ul>
        </section>
        <?php elseif(!empty($_GET)): ?>
            <section id="erro">
                <h2>Dados Inválidos</h2>
                <p>Por favor, preencha todos os campos com números válidos.</p>
            </section>
        <?php endif;?>
</body>
</html>