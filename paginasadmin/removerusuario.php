<?php

require '../config.php';
require '../classesEsimilares/Usuarios.php';
require '../classesEsimilares/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mudastatusUsuario = new Usuarios($mysql);
    $remove = $mudastatusUsuario->mudastatus($_POST['id'], $_POST['Statuss']);
    redireciona('../paginasvisualizacao/usuarioscadastrados.php');
}


?>


<!DOCTYPE html>
<html lang="pt">
 
    <head>
        <title>Aprendendo a fazer upload csv pro banco de dados</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/diversos.css">
        <link rel="stylesheet" href="../assets/css/cadastro.css">
 
    </head>

    <body>

        <div id="divexclusao">

        <p id="textoedicao"> Para "excluir" digite 2 no Status e clique no botão </p>

    
            
            <form action="removerusuario.php" method="post" class ="formadicionar" data-form>

                <input type="text" class="nomepreco"  required placeholder=" 1" name="id" value="<?php echo $_GET['id']; ?>">

                <input type="text" class="nomepreco"  required placeholder=" Status" name="Statuss" value="">
                          
                <input type="submit" id="mudastatuss" value="Excluir usuario" class="botaoaedita" name="mudastattus">	

            </form>	
  
        </div>

    </body>

</html>    