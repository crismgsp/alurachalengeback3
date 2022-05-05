<?php

$mysql = new mysqli('localhost', 'root', '','csv');
    $mysql-> set_charset('utf8');

    if($mysql == FALSE) {
        echo "Erro na conexao";
    } 


    
        

    
        $mesescolhido = 6;

        $query= ("SELECT BancoOrigem, AgenciaOrigem, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY ContaOrigem, BancoOrigem, AgenciaOrigem"); 
        
        $resultado = mysqli_query($mysql, $query);
             
        $dadosconta = $resultado->fetch_all(MYSQLI_ASSOC);

        $query =("SELECT BancoDestino, AgenciaDestino, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY ContaDestino, BancoDestino, AgenciaDestino");

        $resultado2 = mysqli_query($mysql, $query);

        $dadosconta2 = $resultado2->fetch_all(MYSQLI_ASSOC);

        $agenciasuspeita = array();

        foreach($dadosconta as $dados) {
            $soma = $dados['Soma'];

            array_push($agenciasuspeita, $dados);
            
        }    

        foreach($dadosconta2 as $dados2) {
            $soma = $dados['Soma'];
            array_push($agenciasuspeita, $dados2);
           
        }


        /*var_dump($agenciasuspeita);
        exit();

        array(8) { [0]=> array(3) { ["BancoOrigem"]=> string(15) "BANCO DO BRASIL" ["AgenciaOrigem"]=> string(1) "1"
             ["Soma"]=> string(6) "250000" } [1]=> array(3) { ["BancoOrigem"]=> string(8) "BRADESCO" ["AgenciaOrigem"]=> string(1) "1" ["Soma"]=> string(9)
                 "300000000" } [2]=> array(3) { ["BancoOrigem"]=> string(5) "CAIXA" ["AgenciaOrigem"]=> string(1) "1" ["Soma"]=> string(6) "430000" } [3]=> array(3)
                 { ["BancoOrigem"]=> string(9) "SANTANDER" ["AgenciaOrigem"]=> string(1) "1" ["Soma"]=> string(6) "800000" } [4]=> array(3) { ["BancoOrigem"]=> string(22)
                     "TESTE AGENCIA SUSPEITA" ["AgenciaOrigem"]=> string(1) "1" ["Soma"]=> string(9) "750000000" } [5]=> array(3) { ["BancoDestino"]=> string(14) 
                        "BANCO BRADESCO" ["AgenciaDestino"]=> string(1) "1" ["Soma"]=> string(9) "750800000" } [6]=> array(3) { ["BancoDestino"]=> string(19) 
                            "CONTA SUSPEITA MAIO" ["AgenciaDestino"]=> string(1) "1" ["Soma"]=> string(6) "680000" } [7]=> array(3) { ["BancoDestino"]=> string(22) 
                                "TESTE AGENCIA SUSPEITA" ["AgenciaDestino"]=> string(1) "1" ["Soma"]=> string(9) "300000000" } }  */

        $agenciasuspeitatotal = array();

        foreach($agenciasuspeita as $suspeita ) {
            if($soma > 1000000000) {
                array_push($agenciasuspeitatotal, $dados2);
            }
        }

        var_dump($agenciasuspeitatotal);
        exit();