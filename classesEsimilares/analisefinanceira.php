<?php

class Analise
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function Conta (): array
    {
        $resultado = $this->mysql->query("SELECT * FROM `transacoes` WHERE `DataeHora` =?");   
             
        $dadosconta = $resultado->fetch_all(MYSQLI_ASSOC);
        
        /*aqui vou colocar um jeito de somar os valores pra todas contas e caso a soma seja maior que 1.000.000 vai ser retornada em uma 
        variavel.... em vez de retornar dadosconta..vai retornar a nova variavel so com somas maiores que este valor */

        return $dadosconta;
    }

    

