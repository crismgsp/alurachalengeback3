<?php

require '../config.php';
require '../classes/Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] ==='POST') {
	$inserirus = new Usuarios($mysql);
	$inserirus->adicionarusuario($_POST['ID'], $_POST['Nome'], $_POST['Email'], $_POST['Statuss']);
}
?>

<!DOCTYPE html>

<html lang=”pt-br”>

    <head>
		<meta charset =”UTF-8
		<meta name="viewport" content="width=device-width initial-scale=1.0"> 
		<title>Cadastro de Usuarios</title>
		
		
		<link rel="stylesheet" href="cadastro.css">
        
		<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css' type='text/css'>
		
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

		
	</head>

	<body>

        <header>
	
			<a href="usuarioscadastrados.php"><button  id="administrador">Ver usuários cadastrados</button></a>
			
				
		</header>	
        
        

        
        <form action="cadastrarusuarios.php" method="post" class ="formadicionar" data-form>
           
			
			<input type="text" class="nomepreco"  required placeholder="ID" name="ID" > 

            <input type="text" class="nomepreco"  required placeholder="Nome Completo" name="Nome" > 

            <input type="text" class="nomepreco"  required placeholder="Email nome@email.com" name="Email" >

			<input type="text" class="nomepreco"  required placeholder="Status 1" name="Statuss" >
                        
            <input type="submit" value="Adicionar usuario" class="botaoadiciona">	

        </form>	

    </body>
    
</html>    