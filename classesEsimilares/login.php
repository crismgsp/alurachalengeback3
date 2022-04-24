<?php

require '../config.php';

if(empty($_POST['Email']) || empty($_POST['Senha'])) {
    header('Location: ../paginasvisualizacao/paginalogin.php');
    exit();
}


$query = sprintf(
    "SELECT Senha FROM usuarios WHERE Email='%s'",
    mysqli_real_escape_string($mysql, $_POST['Email'])
);

$result = mysqli_query($mysql, $query);


if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$row = mysqli_fetch_row($result);


if (password_verify($_POST['Senha'], $row[0]))  {
    header('Location: ../paginasadmin/importacoes.php');
    exit();
}else {
    echo "Usuario ou senha não existem";
}
