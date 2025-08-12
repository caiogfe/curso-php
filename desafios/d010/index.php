<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 10</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $atual = date('Y');
        $nasc = filter_input(INPUT_GET, 'nasc', FILTER_VALIDATE_INT);
        $ano = filter_input(INPUT_GET, 'ano', FILTER_VALIDATE_INT);
        $idade = null;
        $erro = "";
        if ($_GET) {
            if ($nasc === false || $ano === false) {
                $erro = "Por favor, informe valores válidos.";
            } elseif ($nasc <= 0 || $ano <= 0) {
                $erro = "Nenhum dos anos devem ser iguais ou menores que zero.";
            } elseif ($nasc > $ano) {
                $erro = "O ano de nascimento deve ser menor que o ano futuro.";
            } else {
                $idade = $ano - $nasc;
            }
        }
    ?>
    <main>
        <h1>Cálculo de Idade</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idnasc">Em que ano você nasceu?</label>
                <input type="number" name="nasc" id="idnasc" min="1" required value="<?=htmlspecialchars($nasc)?>">
            </div>
            <div class="campo">
                <label for="idano">Quer saber sua idade em que ano? (atualmente estamos em <strong><?=$atual?></strong>)</label>
                <input type="number" name="ano" id="idano" min="1" required value="<?=htmlspecialchars($ano)?>">
            </div>
            <input type="submit" value="Qual será minha idade?">
        </form>
    </main>
    <?php 
        if ($erro): ?>
        <section class="mensagem-erro">
            <h2>Erro</h2>
            <p><?=$erro?></p>
        </section>
    <?php elseif($idade !== null): ?>
        <section>
            <h2>Resultado Final</h2>
            <p>Quem nasceu em <?=$nasc?> vai ter <strong><?=$idade?> anos</strong> em <?=$ano?>!</p>
        </section>
    <?php endif?>
</body>
</html>