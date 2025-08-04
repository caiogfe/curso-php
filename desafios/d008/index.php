<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 8</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <?php 
            $valorNumero = (int)($_GET['numero'] ?? 0);
            $raizQuadrada = sqrt($valorNumero); 
            $raizCubica = ;
        ?>
        <h1>Informe um número</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
            <div class="campo">
                <label for="idnumero">Número</label>
                <input type="number" name="numero" id="idnumero" min="0" value="<?=htmlspecialchars($valorNumero)?>">
            </div>
            <input type="submit" value="Calcular Raízes">
        </form>
    </main>
</body>
</html>