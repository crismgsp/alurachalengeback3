<?php

    require '../config.php';

    function csvpraarray(): array
    { 
        $arquivo = $_FILES["file"]["tmp_name"];
        $nome = $_FILES["file"]["name"];
    
        $ext = explode(".", $nome);
    
        $extensao = end($ext);
    
        if($extensao != "csv") {
            echo "Extensao invalida";
        }else{
            $objeto = fopen($arquivo, 'r');
            $header = fgetcsv($objeto, 1000, ",");
            
            $lista = array();

            array_push($lista, $header);

            while($objeto1 = fgetcsv($objeto, 1000, ",") !== FALSE) {
                    
                $linha = fgetcsv($objeto, 1000, ",");
                    
                array_push($lista, $linha);
    
            }
            return $lista;

        }    
          
    } 

    $listatotal = & csvpraarray(); 
    
    
    
    function comparadata() : void
    { 

        $mysql = new mysqli('localhost', 'root', '','csv');
        $mysql-> set_charset('utf8');

        global $listatotal;
        $primeiralinha = $listatotal[0];
        $primeiralinhadata = $primeiralinha[7];
        $dataehorap = explode("T", $primeiralinhadata);
        $datap = $dataehorap[0];
        
    
        $query = (
            "SELECT DataeHora FROM transacoes GROUP BY DataeHora");
        
        
        $result = mysqli_query($mysql, $query);

              
        
        if (!$result) {
            $message  = 'Invalid query: ' . mysql_error() . "\n";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        
        $DataeHora = mysqli_fetch_all($result);

        /* este fiz so pra testar...como imprime data da primeira linha do 
        banco de dados...deixei pra lembrar
        $linha = $DataeHora[0];
        $stringlinha = implode("", $linha);
        $databanco = substr($stringlinha, 0, 10); */
        
        
       for ($i=0; $i <= count($DataeHora); $i++) {
        $linha = $DataeHora[$i];
       
        $stringlinha = implode("", $linha);
        $databanco = substr($stringlinha, 0, 10);
            
            if($datap === $databanco) {
                echo "Já foi feita importação com esta data";
            } /*else {
                aqui vou comparar a data da linha inicial com a data de cada linha da tabela
                
            } */
             
        }  
    }              

    comparadata();

/*
   
    
        
            
           /* while(($dados = fgetcsv($objeto, 1000, ",")) !== FALSE)
            {
                    
                    
                    
                    $linhas = fgetcsv($objeto, 1000, ",");



                    $linhasdata = $linhas[7];
                    $dataehoralinhas = explode("T", $linhasdata);
                    $datal = $dataehoralinhas[0];

                                    
                    if($datal != $datap) ; {
                        unset($linhas);
                    }

                
                    $BancoOrigem = utf8_encode($dados[0]);
                    $AgenciaOrigem = utf8_encode($dados[1]);
                    $ContaOrigem = utf8_encode($dados[2]);
                    $BancoDestino = utf8_encode($dados[3]);
                    $AgenciaDestino = utf8_encode($dados[4]);
                    $ContaDestino = utf8_encode($dados[5]);
                    $Valor = utf8_encode($dados[6]);
                    $DataeHora = utf8_encode($dados[7]);
                    
                    $url = str_replace("Novo/", "", $_SERVER["REQUEST_URI"]);


                    $explodeurl = explode("=", $url);

                    
                    $usuariomodificado = $explodeurl[1];
                                
                    $usuariomodificado2 = str_replace("%27", " ", $usuariomodificado);

                    $usuario = str_replace("%20", " ", $usuariomodificado);

                
                    $result = $mysql->query("INSERT INTO transacoes (BancoOrigem, AgenciaOrigem, ContaOrigem, BancoDestino, AgenciaDestino, ContaDestino, Valor, DataeHora,
                    Usuario ) VALUES ('$BancoOrigem', '$AgenciaOrigem', '$ContaOrigem', '$BancoDestino', '$AgenciaDestino', '$ContaDestino',
                    '$Valor', '$DataeHora', '$usuario')");
            }

            if ($result){
                echo "Dados inseridos com sucesso !!!";
            }else {
                    echo "Ocorreu um erro ao inserir os dados";
            } */
        
        
?>