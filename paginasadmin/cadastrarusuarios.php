<?php

session_start();

include('../classesEsimilares/verificalogin.php');

require '../classesEsimilares/Usuarios.php';

$adiciona = filter_input(INPUT_POST, 'adiciona', FILTER_SANITIZE_SPECIAL_CHARS);
if($adiciona) {
	require '../config.php';
}


if ($_SERVER['REQUEST_METHOD'] ==='POST') {
	$inserirus = new Usuarios($mysql);
	$_POST['Senha']= password_hash($_POST['Senha'], PASSWORD_DEFAULT);
	$inserirus->adicionarusuario($_POST['Nome'], $_POST['Email'], $_POST['Statuss'], $_POST['Senha']);

	header('Location: ../paginasvisualizacao/usuarioscadastrados.php');
	die();
}


?>

<!DOCTYPE html>

<html lang=”pt-br”>

    <head>
		<meta charset =”UTF-8
		<meta name="viewport" content="width=device-width initial-scale=1.0"> 
		
		<link rel="stylesheet" href="../assets/css/usuarios.css">
        	
		
		<link rel="stylesheet" href="../assets/css/cadastro.css">
        
		<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css' type='text/css'>
		
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

		
	</head>

	<body>

        <header>

			<?php

			$url = str_replace("Novo/", "", $_SERVER["REQUEST_URI"]);
                $explodeurl = explode("=", $url);

                            
                $usuariomodificado = $explodeurl[1];
            
                $usuario = str_replace("%27", " ", $usuariomodificado);
            

                ?>

               
	
			
				
		</header>	

		<p>Olá <?php echo $_SESSION['Nome'];?></p>
        
		
		<a href="../paginasvisualizacao/usuarioscadastrados.php?Nome = <?php echo $usuario ?>"><button  id="administrador">Ver usuários cadastrados</button></a>
		<a href="importacoes.php"><button>Voltar para página de importações</button></a>
		<p1><a href="../classesEsimilares/logout.php?Nome = <?php echo $usuario ?>"><button class="logout">Logout</button></a></p1>

        
        

		<form action="cadastrarusuarios.php" method="post" class ="formadicionar" data-form>
			
			

				
			<input type="text" class="nomepreco"  required placeholder="Nome Completo" name="Nome" > 

			<input type="text" class="nomepreco"  required placeholder="Email nome@email.com" name="Email" >

				

			<input type="text" class="nomepreco"  required placeholder="Status 1" name="Statuss" >
			<input type="text" class="nomepreco"  required placeholder="Digite a senha" name="Senha" >
							
			<input type="submit" value="Adicionar usuario" class="botaoadiciona" name="adiciona">	

		</form>	
		

    </body>
    
</html>    