<?php

session_start();
include('../classesEsimilares/verificalogin.php');

require '../config.php';
require '../classesEsimilares/Usuarios.php';
require '../classesEsimilares/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edita = new Usuarios($mysql);
    $editar = $edita->editar($_POST['id'], $_POST['Nome'], $_POST['Email'], $_POST['Senha']);

    redireciona('../paginasvisualizacao/usuarioscadastrados.php');
}



$usuario = new Usuarios($mysql);
$user = $usuario->encontrarPorId($_GET['id']);


?>


<!DOCTYPE html>
<html lang="pt">
 
    <head>
        <title>Editar usuário</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/diversos.css">
        <link rel="stylesheet" href="../assets/css/cadastro.css">
        
 
    </head>

    <body>

        <div id="diveditar">

            <p id="textoedicao"> Edição do usuário </p>  <h3><a hrf="../classeseSimilares/logout.php">Logout</a></h3>

            <form action="editarusuarios.php?id=<?php echo $user['id']?>"  method="post" class ="formadicionar" data-form>
           
                
                <input type="hidden" class="nomepreco"   name="id" value="
                <?php echo $user['id']; ?>" > 
                
                <input type="text" class="nomepreco"   name="Nome" value="
                <?php echo $user['Nome']; ?>" > 

                <input type="text" class="nomepreco"  required placeholder="Email nome@email.com" name="Email"
                value= "<?php echo $user['Email']; ?>" >

                <input type="text" class="nomepreco"  required placeholder="Digite a senha" name="Senha" >
                            
                <input type="submit" value="Editar usuario" class="botaoaedita" name="edita">	

            </form>	
   
        </div>

    </body>

</html>    