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
        $resultado = $this->mysql->query("SELECT * FROM `transacoes` WHERE `ContaOrigem` = ? OR `ContaDestino` =?");   
             
        $dadosconta = $resultado->fetch_all(MYSQLI_ASSOC);

        return $dadosconta;
    }

