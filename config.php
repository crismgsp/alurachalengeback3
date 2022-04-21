<?php

$mysql = new mysqli('localhost', 'root', '','csv');
$mysql-> set_charset('utf8');

if($mysql == FALSE) {
    echo "Erro na conexao";
}

?>