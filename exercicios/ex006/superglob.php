<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobais em PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
            <?php 
                setcookie("dia-da-semana", "SEGUNDA", time() + 3600);

                session_start();
                $_SESSION["teste"] = "FUNCIONOU!";

                function exibe($titulo, $conteudo) {
                    echo "<h1>$titulo</h1><pre>";
                    var_dump($conteudo);
                    echo "</pre>";
                }

                exibe("Superglobal GET", $_GET);
                exibe("Superglobal POST", $_POST);
                exibe("Superglobal REQUEST", $_REQUEST);
                exibe("Superglobal COOKIE", $_COOKIE);
                exibe("Superglobal SESSION", $_SESSION);

                echo "<h1>Superglobal ENV</h1><pre>";
                foreach (getenv() as $c => $v) {
                    echo "<br>$c -> $v";
                }
                echo "</pre>";

                exibe("Superglobal SERVER", $_SERVER);
                exibe("Superglobal GLOBALS", $GLOBALS);

            ?>
    </main>
</body>
</html>