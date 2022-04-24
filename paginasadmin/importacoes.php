

<!DOCTYPE html>
<html lang="pt">
 
    <head>
        <title>Aprendendo a fazer upload csv pro banco de dados</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>

    <body>

        <div id="cabecalho">
            <div id="titulodiv">
                <h1 id="titulosuperior">Importar transações</h1> 
                
            </div>
            
        </div>

        <div class="container">

            <?php
            $url = str_replace("Novo/", "", $_SERVER["REQUEST_URI"]);
            $explodeurl = explode("=", $url);

                            
            $usuariomodificado = $explodeurl[1];
            
            $usuario = str_replace("%27", " ", $usuariomodificado);
            

            ?>

                            
            <form action="../classesEsimilares/importar.php?Nome = <?php echo $usuario ?>" method="post" enctype="multipart/form-data">
                <div class="jumbotron">
                <h2>Upload do CSV</h2>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file">
                        <label class="custom-file-label" for="customFile"></label>
                    </div>
                
                    <button type="submit" class="enviar">Enviar</button>
            </form>
        </div>

        <p>Para visualizar as importações já feita clique aqui <a href="../paginasvisualizacao/importacoesfeitas.php">
                <button id="botaoacesso">Ver importações</button></a>  </p>

        <p>Para cadastrar usuários ou ver os cadastrados clique aqui <a href="cadastrarusuarios.php">
        <button id="botaoacesso">Ver usuarios ou cadastrar</button></a>  </p>        

        

    </body>

</html>