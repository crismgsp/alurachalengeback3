<?php

require '../config.php';

if(empty($_POST['Nome']) || empty($_POST['Senha'])) {
    header('Location: ../paginasvisualizacao/paginalogin.php');
    exit();
}

$Nome = mysqli_real_escape_string($mysql, $_POST['Nome']);
$Senha = mysqli_real_escape_string($mysql, $_POST['Senha']);

$query = "select * from usuarios where Nome ={$Nome} and Senha = {$Senha}';

$result = mysqli_query($mysql, $query);

$row = mysqli_num_rows($result);

echo $row;exit;

if($row ==1) {
    $_SESSION[Nome] = $Nome;
    header('Location: ../paginasadmin/importacoes.php')
    exit();
}else { 
    header:('Location: ../paginasvisualizacao/paginalogin.php');
    exit();   
}

