<?php

require '../config.php';
require '../classesEsimilares/Usuarios.php';
require '../classesEsimilares/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mudastatusUsuario = new Usuarios($mysql);
    $remove = $mudastatusUsuario->mudastatus($_POST['id'], $_POST['Statuss']);
    
    redireciona('../paginasvisualizacao/usuarioscadastrados.php');
}

$usuario = new Usuarios($mysql);
$user = $usuario->encontrarPorId($_GET['id']);


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

    
            
            <form action="removerusuario.php?id=<?php echo $user['id']?>" method="post" class ="formadicionar" data-form>

                <input type="hidden" class="nomepreco"   name="id" value="<?php echo $user['id']; ?>">

                <input type="text" class="nomepreco"   name="Statuss" value="<?php echo $user['Statuss']; ?>">
                          
                <button id="mudastatuss" class="botaoaedita" name="mudastattus">Excluir usuario</button>	

            </form>	
  
        </div>

    </body>

</html>    