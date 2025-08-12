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
        $valor1 = filter_input(INPUT_GET, 'valor1', FILTER_VALIDATE_FLOAT);
        $valor2 = filter_input(INPUT_GET, 'valor2', FILTER_VALIDATE_FLOAT);
        $peso1 = filter_input(INPUT_GET, 'peso1', FILTER_VALIDATE_INT);
        $peso2 = filter_input(INPUT_GET, 'peso2', FILTER_VALIDATE_INT);
    ?>
    <main>
        <h1>Médias Aritméticas</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idvalor1">1º Valor</label>
                <input type="number" name="valor1" id="idvalor1" step="0.1" required value="<?=htmlspecialchars($valor1)?>">
            </div>
            <div class="campo">
                <label for="idpeso1">1º Peso</label>
                <input type="number" name="peso1" id="idpeso1" required min="1" value="<?=htmlspecialchars($peso1)?>">
            </div>
            <div class="campo">
                <label for="idvalor2">2º Valor</label>
                <input type="number" name="valor2" id="idvalor2" step="0.1" required value="<?=htmlspecialchars($valor2)?>">
            </div>
            <div class="campo">
                <label for="idpeso2">2º Peso</label>
                <input type="number" name="peso2" id="idpeso2" required min="1" value="<?=htmlspecialchars($peso2)?>">
            </div>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <?php 
        $somaPesos = $peso1 + $peso2;
        if (isset($_GET['valor1']) && isset($_GET['valor2']) && isset($_GET['peso1']) && isset($_GET['peso2'])): ?>
            <?php if ($somaPesos <= 0): ?>
            <section class="mensagem-erro">
                <h2>Erro</h2>
                <p>A soma dos pesos não pode ser igual ou menor a zero.</p>
            </section>
            <?php elseif ($valor1 === false || $valor2 === false || $peso1 === false || $peso1 <= 0 || $peso2 === false || $peso2 <= 0):?>
                <section class="mensagem-erro">
                    <h2>Erro</h2>
                    <p>Por favor, informe valores válidos.</p>
                </section>
            <?php endif?>
        <?php endif?>
        <?php if ($valor1 !== '' && $valor1 >= 0 && $valor2 !== '' && $valor2 >= 0 && $peso1 !== '' &&  $peso1 >= 1 && $peso2 !== '' && $peso2 >= 1):
                $mediaSimples = ($valor1 + $valor2) / 2;
                $mediaPonderada = (($valor1 * $peso1) + ($valor2 * $peso2)) / $somaPesos;?>
                <section>
                    <h2>Resultado Final</h2>
                    <p>Analisando os valores <strong><?=number_format($valor1, 1, ",", ".")?> e <?=number_format($valor2, 1, ",", ".")?></strong></p>
                    <ul>
                        <li>A <strong>Média Aritmética Simples</strong> entre os valores é igual a <?=number_format($mediaSimples, 2, ",", ".")?></li>
                        <li>A <strong>Média Aritmética Ponderada</strong> com pesos <?=number_format($peso1, 1, ",", ".")?> e <?=number_format($peso2, 1, ",", ".")?> é igual a <?=number_format($mediaPonderada, 2, ",", ".")?></li>
                    </ul>
                </section>
    <?php endif?>
</body>
</html>