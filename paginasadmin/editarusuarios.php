<?php

require '../config.php';
require '../classesEsimilares/Usuarios.php';
require '../classesEsimilares/redireciona.php';

$edita = new Usuarios($mysql);
$editar = $edita->encontrarPorId($_GET['id']);


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

        <div id="diveditar">

            <p id="textoedicao"> Edição do usuário </p>

            <form action="editarusuarios.php" method="post" class ="formadicionar" data-form>
           
		
                <input type="text" class="nomepreco"  required placeholder="Nome Completo" name="Nome" value="
                <?php echo $editar['Nome']; ?>" > 

                <input type="text" class="nomepreco"  required placeholder="Email nome@email.com" name="Email"
                value= "<?php echo $editar['Email']; ?>" >

                <input type="text" class="nomepreco"  required placeholder="Digite a senha" name="Senha" >
                            
                <input type="submit" value="Editar usuario" class="botaoaedita" name="edita">	

            </form>	
   
        </div>

    </body>

</html>    