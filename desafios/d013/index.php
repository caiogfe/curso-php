<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 13</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $valorPadrao = numfmt_create('pt_BR', NumberFormatter::CURRENCY);
        $valorSaque = filter_input(INPUT_GET, 'saque', FILTER_VALIDATE_INT);
        $resultadoFinal = null;
        $mensagemErro = "";

        if(isset($_GET['saque'])) {
            if($valorSaque === false) {
                $mensagemErro = "Por favor, informe um valor válido.";
            } elseif ($valorSaque <= 0) {
                $mensagemErro = "Não é possível realizar o saque de um valor igual ou menor a zero.";
            } elseif (($valorSaque % 5 !== 0)) {
                $mensagemErro = "Só é possível realizar o saque de um valor múltiplo de 5.";
            } else {
                $restoSaque = $valorSaque;
                $total100 = floor($restoSaque / 100);
                $restoSaque %= 100;
                $total50 = floor($restoSaque / 50);
                $restoSaque %= 50;
                $total10 = floor($restoSaque / 10);
                $restoSaque %= 10;
                $total5 = floor($restoSaque / 5);

                $resultadoFinal = [
                    'total100' => $total100,
                    'total50' => $total50,
                    'total10' => $total10,
                    'total5' => $total5
                ];
            }
        }
    ?>
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idsaque">Qual valor você deseja sacar? (R$)<sup>*</sup></label>
                <input type="number" name="saque" id="idsaque" step="5" required value="<?=htmlspecialchars($valorSaque)?>">
            </div>
            <p>*Notas disponíveis: R$100, R$50, R$10 e R$5</p>
            <input type="submit" value="Sacar">
        </form>
    </main>
    <?php if($mensagemErro): ?>
        <section class="mensagem-erro">
            <h2>Erro</h2>
            <p><?=$mensagemErro?></p>
        </section>
    <?php elseif($resultadoFinal): ?>
        <section>
            <h2>Saque de <?=numfmt_format_currency($valorPadrao, $valorSaque, 'BRL')?> realizado</h2>
            <p>As seguintes notas serão entregues pelo caixa eletrônico:</p>
            <ul>
                <li><img src="imagens/nota-100.jpg" alt="Nota de R$100,00" class="nota"> x<?=$total100?></li>
                <li><img src="imagens/nota-50.jpg" alt="Nota de R$50,00" class="nota"> x<?=$total50?></li>
                <li><img src="imagens/nota-10.jpg" alt="Nota de R$10,00" class="nota"> x<?=$total10?></li>
                <li><img src="imagens/nota-5.jpg" alt="Nota de R$5,00" class="nota"> x<?=$total5?></li>
            </ul>
        </section>
    <?php endif ?>
</body>
</html>