<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos primitivos em PHP</title>
</head>
<body>
    <h1>Teste de tipos primitivos</h1>
    <?php 
        //0x = hexadecimal 0b = binário 0 = octal
        //$num = 0x1A;
        //echo "O valor da variável é $num";

        //$num = (int) 3e2;
        //echo "O valor é $num";
        //var_dump($num);
        //coerção

        //$v = "Caio";
        //var_dump($v);

        //$casado = false;
        //var_dump($casado);
        //echo "O valor para casado é $casado";
        //para variável boolean true == 1 e false vazio

        //$vet = [6, 5.5, true, "Caio"];
        //var_dump($vet);

        class Pessoa {
            private string $nome;
        }

        $p = new Pessoa;
        var_dump($p);
    ?>
</body>
</html>