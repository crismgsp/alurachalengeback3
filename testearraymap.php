<?php

    $mysql = new mysqli('localhost', 'root', '','csv');
    $mysql-> set_charset('utf8');

    if($mysql == FALSE) {
        echo "Erro na conexao";
    } 


        $mesescolhido = 6;

        $query= ("SELECT BancoOrigem as Banco, AgenciaOrigem as Agencia, ContaOrigem as Conta, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY ContaOrigem, BancoOrigem, AgenciaOrigem"); 
        
        $resultado = mysqli_query($mysql, $query);
             
        $dadosconta = $resultado->fetch_all(MYSQLI_ASSOC);

        
        $query =("SELECT BancoDestino as Banco, AgenciaDestino as Agencia, ContaDestino as Conta, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY ContaDestino, BancoDestino, AgenciaDestino");

        $resultado2 = mysqli_query($mysql, $query);

        $dadosconta2 = $resultado2->fetch_all(MYSQLI_ASSOC); 

        

        $dadostotais = array_merge($dadosconta, $dadosconta2); 

        $obterdadosindividuais = function($d) {
            return $d['Banco']['Agencia']['Conta']['Soma'];
        };

       

        $contasuspeita1 = array();

        foreach($dadostotais as $dados) {
            $chave = $dados['Banco'].$dados['Agencia'].$dados['Conta'];
            if (!array_key_exists($chave, $contasuspeita1)) {
                $contasuspeita1[$chave] = array( 
                    'Banco' => $dados['Banco'],
                    'Agencia' => $dados['Agencia'],
                    'Conta' => $dados['Conta'],
                    'Soma' => $dados['Soma'],
                    
                );
            }else{
                $contasuspeita1[$chave] = array (
                    'Banco' => $dados['Banco'],
                    'Agencia' => $dados['Agencia'],
                    'Conta' => $dados['Conta'],
                    'Soma' => $contasuspeita1[$chave]['Soma'] + $dados['Soma'],
                );
            }
        }

        $contasuspeita = array();
        
        foreach($contasuspeita1 as $dados) {
            $soma = $dados['Soma'];

            if($soma > 1000000) {
                array_push($contasuspeita, $dados);
            }
        }
        
        var_dump($contasuspeita);
        exit();  
        