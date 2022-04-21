<?php

$mysql = new mysqli('localhost', 'root', '', 'csv');
$mysql-> set_charset('utf8');

$arquivo = $_FILES["file"]["tmp_name"];
$nome = $_FILES["file"]["name"];

$ext = explode(".", $nome);

$extensao = end($ext);

if($extensao != "csv") {
    echo "Extensao invalida";
    }
    elseif{
        $objeto = fopen($arquivo, 'r');

        $tabela = fgetcsv($objeto, 1000, ",");

       
        foreach ($tabela as $conferenulos) {
          
            if ($conferenulos === NULL){
                echo "Há dados nulos no arquivo, corrija antes de inserir";
            }
        }

       
        /*$linha1 = $tabela[0];

        $linhas = end($linhasexplode);
       
        $primeiralinha = $linhas[0];
        $dataprimeiralinha = $primeiralinha[7];
        $lista2 = array();

        foreach($lista1 as $conferedatas){
                    
            if ($conferedatas[7] === $dataprimeiralinha) {
                $lista2[] = $conferedatas;
            }
        }  */ 
    }


        while(($dados = fgetcsv($objeto, 1000, ",")) !== FALSE)

        {
            $BancoOrigem = utf8_encode($dados[0]);
            $AgenciaOrigem = utf8_encode($dados[1]);
            $ContaOrigem = utf8_encode($dados[2]);
            $BancoDestino = utf8_encode($dados[3]);
            $AgenciaDestino = utf8_encode($dados[4]);
            $ContaDestino = utf8_encode($dados[5]);
            $Valor = utf8_encode($dados[6]);
            $DataeHora = utf8_encode($dados[7]);

     
            $result = $mysql->query("INSERT INTO transacoes (BancoOrigem, AgenciaOrigem, ContaOrigem, BancoDestino, AgenciaDestino, ContaDestino, Valor, DataeHora
              ) VALUES ('$BancoOrigem', '$AgenciaOrigem', '$ContaOrigem', '$BancoDestino', '$AgenciaDestino', '$ContaDestino',
            '$Valor', '$DataeHora')");
        }

        if ($result){
            echo "Dados inseridos com sucesso !!!";
        }else {
            echo "Ocorreu um erro ao inserir os dados";
        }
    

?>