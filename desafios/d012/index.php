<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 12</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $valorMinuto = 60;
        $valorHora = 3600;
        $valorDia = 86400;
        $valorSemana = 604800;
        $totalTempo = filter_input(INPUT_GET, 'tempo', FILTER_VALIDATE_INT);
        $resultadoFinal = null;
        $mensagemErro = '';

        if(isset($_GET['tempo'])) {
            if ($totalTempo === false) {
                $mensagemErro = "Por favor, adicione um valor válido.";
            } elseif ($totalTempo <= 0) {
                $mensagemErro = "O valor digitado deve ser maior que zero.";
            } else {
                $totalSemanas = intdiv($totalTempo, $valorSemana);
                $totalDias = intdiv(($totalTempo % $valorSemana), $valorDia);
                $totalHoras = intdiv(($totalTempo % $valorDia), $valorHora);
                $totalMinutos = intdiv(($totalTempo % $valorHora), $valorMinuto);
                $totalSegundos = ($totalTempo % $valorHora) % $valorMinuto;

                $resultadoFinal = [
                    'totalSemanas' => $totalSemanas,
                    'totalDias' => $totalDias,
                    'totalHoras' => $totalHoras,
                    'totalMinutos' => $totalMinutos,
                    'totalSegundos' => $totalSegundos
                ];
            }
        }
    ?>
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idtempo">Qual é o total de segundos?</label>
                <input type="number" name="tempo" id="idtempo" min="1" step="1" value="<?=htmlspecialchars($totalTempo)?>" required>
            </div>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <?php 
        if ($mensagemErro): ?>
        <section class="mensagem-erro">
            <h2>Erro</h2>
            <p><?=$mensagemErro?></p>
        </section>
    <?php elseif ($resultadoFinal): ?>
        <section>
            <h2>Resultado Final</h2>
            <p>Analisando o valor que você digitou, <strong><?=number_format($totalTempo, 0, ",",".")?> segundos</strong> equivalem a um total de:</p>
            <ul>
                <li><?=$resultadoFinal['totalSemanas'] . " semanas"?></li>
                <li><?=$resultadoFinal['totalDias'] . " dias"?></li>
                <li><?=$resultadoFinal['totalHoras'] . " horas"?></li>
                <li><?=$resultadoFinal['totalMinutos'] . " minutos"?></li>
                <li><?=$resultadoFinal['totalSegundos'] . " segundos"?></li>
            </ul>
        </section>
    <?php endif?>
</body>
</html>