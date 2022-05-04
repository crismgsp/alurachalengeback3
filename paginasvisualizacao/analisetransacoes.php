<?php

require '../config.php';
require '../classesEsimilares/analisefinanceira.php';


$contas = new Analise($mysql);
$contassuspeitas = $contas->Contasuspeita();


?>

<!DOCTYPE html>
<html lang="pt">
 
    <head>
        <title>Visualizar importacoes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>

    <body>

    <div>
    <p1>Escolha o mês de analise (digite o número do mês (1 a 12) </p1>    
    <form name="selecao" action="analisetransacoes.php" method="POST">
        <input name="selecao"></input>    
    </form>

    </div>

    <h3>Transacoes Suspeitas</h3>
    
    <table class="table" >
        <thead>
            <tr>
                <th scope="col">Banco de Origem</th>
                <th scope="col">Agencia de Origem</th>
                <th scope="col">Conta de Origem</th>
                <th scope="col">Banco de Destino</th>
                <th scope="col">Agencia de Destino</th>
                <th scope="col">Conta de Destino</th>
                <th scope="col">Valor</th>  
                <th scope="col">Data e Hora da transação</th>
                <th scope="col">Data e Hora da Importação</th>
                <th scope="col">Mes</th>


            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($contassuspeitas as $contas) : ?>
                <tr>
                    <td><?php echo $contas['BancoOrigem']; ?></td>
                    <td><?php echo $contas['AgenciaOrigem']; ?></td>
                    <td><?php echo $contas['ContaOrigem']; ?></td>
                    <td><?php echo $contas['BancoDestino']; ?></td>
                    <td><?php echo $contas['AgenciaDestino']; ?></td>
                    <td><?php echo $contas['ContaDestino']; ?></td>
                    <td><?php echo $contas['Valor']; ?></td>
                    <td><?php echo $contas['DataeHora']; ?></td>
                    <td><?php echo $contas['DataHoraImportacao']; ?></td>
                    <td><?php echo $contas['Mes']; ?></td>
                    

                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>

    <h3>Contas Suspeitas</h3>
    <table class="table" >
        <thead>
            <tr>
                <th scope="col">Banco de Origem</th>
                <th scope="col">Agencia de Origem</th>
                <th scope="col">Conta de Origem</th>
                <th scope="col">Banco de Destino</th>
                <th scope="col">Agencia de Destino</th>
                <th scope="col">Conta de Destino</th>
                <th scope="col">Valor</th> aqui vai ter que dar um jeito de colocar toda a soma do valor mensal desta conta
                <th scope="col">Data e Hora da transação</th>
                <th scope="col">Data e Hora da Importação</th>
                <th scope="col">Mes</th>


            </tr>
        </thead>
        <tbody>
            <?php foreach ($imprime as $imprimirdados) : ?>
                <tr>
                    <td><?php echo $imprimirdados['BancoOrigem']; ?></td>
                    <td><?php echo $imprimirdados['AgenciaOrigem']; ?></td>
                    <td><?php echo $imprimirdados['ContaOrigem']; ?></td>
                    <td><?php echo $imprimirdados['BancoDestino']; ?></td>
                    <td><?php echo $imprimirdados['AgenciaDestino']; ?></td>
                    <td><?php echo $imprimirdados['ContaDestino']; ?></td>
                    <td><?php echo $imprimirdados['Valor']; ?></td>
                    <td><?php echo $imprimirdados['DataeHora']; ?></td>
                    <td><?php echo $imprimirdados['DataHoraImportacao']; ?></td>
                    

                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>

    <h3>Agencias Suspeitas</h3>
    <table class="table" >
        <thead>
            <tr>
                <th scope="col">Banco de Origem</th>
                <th scope="col">Agencia de Origem</th>
                <th scope="col">Conta de Origem</th>
                <th scope="col">Banco de Destino</th>
                <th scope="col">Agencia de Destino</th>
                <th scope="col">Conta de Destino</th>
                <th scope="col">Valor</th> aqui vai colocar soma mensal de transacoes por agencia
                <th scope="col">Data e Hora da transação</th>
                <th scope="col">Data e Hora da Importação</th>
                <th scope="col">Mes</th>


            </tr>
        </thead>
        <tbody>
            <?php foreach ($imprime as $imprimirdados) : ?>
                <tr>
                    <td><?php echo $imprimirdados['BancoOrigem']; ?></td>
                    <td><?php echo $imprimirdados['AgenciaOrigem']; ?></td>
                    <td><?php echo $imprimirdados['ContaOrigem']; ?></td>
                    <td><?php echo $imprimirdados['BancoDestino']; ?></td>
                    <td><?php echo $imprimirdados['AgenciaDestino']; ?></td>
                    <td><?php echo $imprimirdados['ContaDestino']; ?></td>
                    <td><?php echo $imprimirdados['Valor']; ?></td>
                    <td><?php echo $imprimirdados['DataeHora']; ?></td>
                    <td><?php echo $imprimirdados['DataHoraImportacao']; ?></td>
                    

                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>

