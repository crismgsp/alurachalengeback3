<?php

require '../config.php'

if(empty($_POST['Nome'])) || empty($_POST['Senha'])) {
    header('Location: paginalogin.php');
    exit();
}

$Nome = mysqli_real_escape_string($mysql, $_POST['Nome']);
$Senha = mysqli_real_escape_string($mysql, $_POST['Senha']);


?>