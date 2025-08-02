<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 4 - Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Conversor de Moeda v2.0</h1>
            <?php
                //para mostrar a cotação na data atual do sistema
                $dataIni = date("m-d-Y", strtotime("-7 days")); //data atual - 7 dias
                $dataFim = date("m-d-Y"); //data atual
                //cotação do banco central
                $urlBCB = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'' . $dataIni . '\'&@dataFinalCotacao=\'' . $dataFim . '\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao'; // sempre utilizar \ antes das aspas simples
                $dadosBCB = json_decode(file_get_contents($urlBCB), true); // tratamento de dados em JSON
                $valorCotacao = $dadosBCB["value"][0]["cotacaoCompra"];

                $valorReal = $_POST["moeda"];
                $valorPadrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
                $valorDolar = $valorReal / $valorCotacao;
                echo "<p>Seus " . numfmt_format_currency($valorPadrao, $valorReal, "BRL") . " equivalem a <strong>" . numfmt_format_currency($valorPadrao, $valorDolar, "USD") . "*</strong></p>";
            ?>
        <p>*Cotação obtida diretamente do site do <strong><a href="https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/aplicacao#!/recursos/CotacaoDolarPeriodo#eyJmb3JtdWxhcmlvIjp7IiRmb3JtYXQiOiJqc29uIiwiJHRvcCI6MSwiZGF0YUZpbmFsQ290YWNhbyI6IjA3LTMxLTIwMjUiLCJkYXRhSW5pY2lhbCI6IjA3LTI0LTIwMjUiLCIkb3JkZXJieSI6IgQyBCBkZXNjIn0sInByb3ByaWVkYWRlcyI6WzAsMl19">Banco Central do Brasil</a></strong></p>
        <button class="voltar" onclick="window.location.href='index.html'">Voltar</button>
    </main>
</body>
</html>