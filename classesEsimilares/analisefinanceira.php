<?php

session_start();

class Analise
{
    private $mysql;
    
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function Contasuspeita(): array
    { 
        $resultado = $this->mysql->query("SELECT * FROM transacoes");     
             
        $dadosconta = $resultado->fetch_all(MYSQLI_ASSOC);

        /* checar os valores de todas transacoes se for > que 100.000 armazena no $dadoscontas 
        depois tentar separar por mes para a pessoa poder filtrar*/

        $contasuspeita = array();

        foreach($dadosconta as $dados) {
            $valor = $dados['Valor'];
            if ($valor > 100000) {
                array_push($contasuspeita, $dados);
            }
        }

        return $contasuspeita;
    }
   
}



