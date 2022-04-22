<?php

require '../config.php';
require '../classesEsimilares/Usuarios.php';

$usuariomostra = new Usuarios($mysql);
$usuarios = $usuariomostra->exibirTodos();

?>

<!DOCTYPE html>
<html lang="pt">
 
    <head>
        <title>Usuarios Cadastrados</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/usuarios.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>

    <body>


    <h1 id="titulo">USUÁRIOS CADASTRADOS</h1>

    <a href="../paginasadmin/cadastrarusuarios.php"><button id="novo">Novo usuário</button></a>

    <div class="tabelausuarios">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">OPÇÕES</th>

            </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuariomostra) : ?>
            
                <tr>
                <td><?php echo $usuariomostra['ID'];?></td>
                <td><?php echo $usuariomostra['Nome'];?></td>
                <td><?php echo $usuariomostra['Email'];?></td>
                <td><a href="../paginasadmin/editarusuarios.php?id=<?php echo $usuariomostra['ID'] ?>"> <button id="editar">Editar</button></a>          
                <a href="../paginasadmin/removerusuario.php?id=<?php echo $usuariomostra['ID'] ?>"><button id="remover">Excluir</button></a> </td>


                </tr>
                <?php endforeach; ?>
            
            </tbody>
        </table>
    </div>

    </body>

</html>



