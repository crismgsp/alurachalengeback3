<?php

/*tentando conectar no postgress do supabase */

$servidor = "db.oblojtfzvbsqojyqrrnp.supabase.co";
$porta = 5432;
$bancoDeDados = "postgres";
$usuario= "postgres";
$senha = "";




$mysql = pg_connect("host=$servidor, port=$porta, dbname= $bancoDeDados user=$usuario password=$senha");


if($mysql == FALSE) {
    echo "Erro na conexao";
}







/*
$mysql = new mysqli('localhost', 'root', '','csv');
$mysql-> set_charset('utf8');

if($mysql == FALSE) {
    echo "Erro na conexao";
}

?>