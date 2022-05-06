<?php
session_start();
include('../classesEsimilares/verificalogin.php');


?>


<!DOCTYPE html>
<html lang="pt">
 
    <head>
        <title>Importar transações</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../assets/css/diversos.css">

    </head>

    <body>

        <div id="cabecalho">
            <div id="titulodiv">

                <h2>Seja Bem vindo <?php echo $_SESSION['Nome'];?></h2>
               
                <h1 id="titulosuperior">Importar transações</h1> 
                <a href="../index.html"><button class="logout">Logout</button></a>
                
            </div>
            
        </div>

        <div class="container">

            <?php
           /* $url = str_replace("Novo/", "", $_SERVER["REQUEST_URI"]);
            $explodeurl = explode("=", $url);

                            
            $usuariomodificado = $explodeurl[1];
            
            $usuario = str_replace("%27", " ", $usuariomodificado); */

            $Nome = $_SESSION['Nome'];
            

            ?>

                            
            <form action="../classesEsimilares/importar4.php?Nome = <?php echo $Nome ?>" method="post" enctype="multipart/form-data">
                <div class="jumbotron">
                <h2>Upload do CSV</h2>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file">
                        <label class="custom-file-label" for="customFile"></label>
                    </div>
                
                    <button type="submit" class="enviar">Enviar</button>
            </form>
        </div>

        <?php 

    /*$url = str_replace("Novo/", "", $_SERVER["REQUEST_URI"]);


    $explodeurl = explode("=", $url);

 
    $nomemodificado = $explodeurl[1];
            
    $nomemodificado2 = str_replace("%27", " ", $nomemodificado);

    $nome = str_replace("%20", " ", $nomemodificado2);

    */

    ?>

        <p>Para visualizar as importações já feita clique aqui <a href="../paginasvisualizacao/importacoesfeitas.php?Nome=<?php
        echo $Nome ?>">
                <button id="botaoacesso">Ver importações</button></a>  </p>

        <p>Para cadastrar usuários ou ver os cadastrados clique aqui <a href="cadastrarusuarios.php?Nome=<?php
        echo $Nome ?>.php">
        <button id="botaoacesso">Ver usuarios ou cadastrar</button></a>  </p> 
        
        <p>Para ver as transações suspeitas clique aqui <a href="../paginasvisualizacao/analisetransacoes.php?Nome=<?php
        echo $Nome ?>.php">
        <button id="botaoacesso">Ver transações suspeitas</button></a>  </p> 

        

    </body>

</html>