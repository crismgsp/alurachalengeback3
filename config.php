<?php

$mysql = new mysqli('localhost', 'root', '','csv');
$mysql-> set_charset('utf8');

if($mysql == FALSE) {
    echo "Erro na conexao";
} 



/* esta e a conexao no 00webhost tirei pra fazer um teste...

$mysql = new mysqli('localhost', 'id18873421_root', 'Banco-2022backAlura3','id18873421_csv');
$mysql-> set_charset('utf8');

if($mysql == FALSE) {
    echo "Erro na conexao";
} 


tentando conectar no postgress do supabase deixei quieto por enquanto..deu erro em outros arquivos...

$servidor = "db.oblojtfzvbsqojyqrrnp.supabase.co";
$porta = 5432;
$bancoDeDados = "postgres";
$usuario= "postgres";
$senha = "";


$mysql = @pg_connect("host=$servidor port=$porta dbname=$bancoDeDados user=$usuario password=$senha");


if($mysql == FALSE) {
    echo "Erro na conexao";
}

*/
?>