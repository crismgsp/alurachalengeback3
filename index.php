<?php

include 'service.php';


$imprime = new Imprime($mysql);
$imprimir = $imprime->imprimir();

$imprimedata = new Imprime($mysql);
$imprimirdata = $imprime->imprimirdata(); 


?>


<!DOCTYPE html>
<html lang="pt">
 
    <head>
        <title>Visualizar importacoes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>

    <body>


        <div id="informacoes">

            <div id="cabecalho">
                <h1> Importações realizadas</h1>
                
                <a href="paginalogin.html"><button type="button"  id="botaologin">Login</button></a> 
                
            </div>

            
                <div id="tabelas"> 

                    <div class="tabela1">

                        <table  id="tabela1">    
                            <thead id="titulo1">
                                <tr id="transacoes">
                                    <th scope="col">Data Transações</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                
                                <?php foreach ($imprimirdata as $imprimedata) : ?> 
                                <tr>
                                            
                                    <td id="coluna1">
                                        
                                        <?php 
                                        $dataehora = $imprimedata['Initial'];
                                        $datasemhora = substr($dataehora, 0, 10);

                                        echo "$datasemhora"; 
                                        ?>
                                        
                                    </td>
                                </tr>    
                                <?php endforeach; ?>
                            <tbody>    


                        </table>
                    </div>
                
                    <div class="tabela2">
                        <table  id="tabela2">    
                            
                            <thead id="titulo2">
                                                
                                <tr id="importacoes">
                                    <th scope="col">Data Importações</th>
                                </tr>
                                
                            </thead>
                            <body>
                            <?php foreach ($imprimir as $import) : ?>  
                                <tr>   
                                    <td id="coluna2">
                                        
                                        <?php echo $import['DataHoraImportacao']; ?>
                                            
                                    </td>
                                    <?php endforeach; ?>         
                                </tr>      

                            </body>

                        </table>    
                    </div>


                </div>  
     
        </div>    

    </body>

</html>