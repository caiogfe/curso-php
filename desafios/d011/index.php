<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 11</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $precoProduto = filter_input(INPUT_GET, 'preco', FILTER_VALIDATE_FLOAT);
        $porcentReajuste = filter_input(INPUT_GET, 'reajuste', FILTER_VALIDATE_INT);
        $precoNovo = null;
        $mensagemErro = "";
        $valorPadrao = numfmt_create('pt_BR', NumberFormatter::CURRENCY);
        if($_GET){
            if ($precoProduto === false || $porcentReajuste === false) {
                $mensagemErro = "Por favor, adicione valores válidos.";
            } elseif ($precoProduto < 0.10) {
                $mensagemErro = "O preço do produto deve ser maior que R$ 0,10.";
            } elseif ($porcentReajuste > 100 || $porcentReajuste < 0) {
                $mensagemErro = "A porcentagem de reajuste deve estar entre 0 a 100%.";
            } else {
                $precoNovo = $precoProduto + (($precoProduto * $porcentReajuste) / 100);
            }
        }
    ?>
    <main>
        <h1>Reajuste de Preços</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idpreco">Preço do Produto (R$)</label>
                <input type="number" name="preco" id="idpreco" min="0.10" step="0.01" value="<?=htmlspecialchars($precoProduto)?>">
            </div>
            <div class="campo">
                <label for="idreajuste">Qual será o percentual de reajuste? (<strong><span id="porcent">?</span>%</strong>)</label>
                <input type="range" name="reajuste" id="idreajuste" step="1" min="0" max="100" oninput="mudaValor()" value="<?=htmlspecialchars($porcentReajuste)?>">
            </div>
            <input type="submit" value="Reajustar">
        </form>
    </main>
    <?php 
        if ($mensagemErro):?>
        <section class="mensagem-erro">
            <h2>Erro</h2>
            <p><?=$mensagemErro?></p>
        </section>
    <?php elseif($precoNovo): ?>
        <section>
            <h2>Resultado Final</h2>
            <p><?="O produto que custava " . numfmt_format_currency($valorPadrao, $precoProduto, "BRL") . " com <strong> " . htmlspecialchars($porcentReajuste) . "% de aumento </strong> vai passar a custar <strong> " . numfmt_format_currency($valorPadrao, $precoNovo, "BRL") . " </strong> a partir de agora."?></p>
        </section>
    <?php endif?>
    <script>
        // declarações automáticas
        mudaValor()
        function mudaValor() {
            porcent.innerText = idreajuste.value
        }
    </script>
</body>
</html>