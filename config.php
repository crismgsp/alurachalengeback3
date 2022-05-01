<?php

/* tentando conectar com o banco do supabase */



$mysql = new mysqli('https://oblojtfzvbsqojyqrrnp.supabase.co', 'root', '','backendalurageek');
$mysql-> set_charset('utf8');

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