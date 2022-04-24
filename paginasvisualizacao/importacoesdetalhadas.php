<?php

include '../classeseSimilares/service.php';

require '../config.php';


$imprimedados = new Imprime($mysql);
$imprime = $imprimedados->dadoscompletos();


?>

<!DOCTYPE html>
<html lang="pt">
 
    <head>
        <title>Visualizar importacoes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>

    <body>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Banco de Origem</th>
                <th scope="col">Agencia de Origem</th>
                <th scope="col">Conta de Origem</th>
                


            </tr>
        </thead>
        <tbody>
            <?php foreach ($imprime as $imprimirdados) : ?>
                <tr>
                    <?php echo $imprimirdados['BancoOrigem']; ?>
                    <?php echo $imprimirdados['AgenciaOrigem']; ?>
                    <?php echo $imprimirdados['ContaOrigem']; ?>
                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>
    
    </body>      
    
</html>    
    