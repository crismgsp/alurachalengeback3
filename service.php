<?php

$mysql = new mysqli('localhost', 'root', '', 'csv');
$mysql-> set_charset('utf8');



class Imprime 
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    

    public function imprimir (): array 
    {
        
        $resultado = $this->mysql->query('SELECT DISTINCT DataHoraImportacao FROM transacoes'); 
        
        $imprimir = $resultado->fetch_all(MYSQLI_ASSOC);
               
  
        return $imprimir;
    }

    public function imprimirdata () : array
    {
        
        $resultadodata = $this->mysql->query('SELECT  DISTINCT SUBSTRING(DataeHora, 1, 10) AS Initial FROM transacoes');
        $imprimirdata = $resultadodata->fetch_all(MYSQLI_ASSOC);
        
        
        return $imprimirdata; 
    }  
    
    
}
   