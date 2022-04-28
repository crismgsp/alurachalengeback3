<?php


session_start(); /*tambem coloquei isto dia 27 de abril */

require '../config.php';


if(empty($_POST['Email']) || empty($_POST['Senha'])) {
    header('Location: ../paginasvisualizacao/paginalogin.php');
    exit();
}


$query = sprintf(
    "SELECT Senha, Nome, Statuss FROM usuarios WHERE Email='%s'",
    mysqli_real_escape_string($mysql, $_POST['Email'])
);

$result = mysqli_query($mysql, $query);


if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$row = mysqli_fetch_row($result);

$Nome = $row[1];

$Statuss = $row[2];


if (password_verify($_POST['Senha'], $row[0]) && $Statuss == 1)  {
    $_SESSION['Nome']= $Nome;    /*acrescentei isto dia 27 abril */
    header("Location: ../paginasadmin/importacoes.php?Nome='$Nome'"); 
   
    exit();
}else {
    echo "Usuario ou senha não existem";
    header('Location: ../index.html');
}
