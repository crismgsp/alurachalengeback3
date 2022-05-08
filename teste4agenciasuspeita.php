<?php

    $mysql = new mysqli('localhost', 'root', '','csv');
    $mysql-> set_charset('utf8');

    if($mysql == FALSE) {
        echo "Erro na conexao";
    } 


        $mesescolhido = 6;

        $query= ("SELECT BancoOrigem as Banco, AgenciaOrigem as Agencia, ContaOrigem as Conta, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY  BancoOrigem, AgenciaOrigem"); 
        
        $resultado = mysqli_query($mysql, $query);
             
        $dadosconta = $resultado->fetch_all(MYSQLI_ASSOC);

        
        $query =("SELECT BancoDestino as Banco, AgenciaDestino as Agencia, ContaDestino as Conta, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY  BancoDestino, AgenciaDestino");

        $resultado2 = mysqli_query($mysql, $query);

        $dadosconta2 = $resultado2->fetch_all(MYSQLI_ASSOC); 

        $agenciasuspeita1 = $dadosconta;

        
        
        $agenciasuspeita2 = $dadosconta2;

        foreach($agenciasuspeita2 as $dados1) {
            $posicao = $agenciasuspeita2['Banco']['Agencia'];
            if ($posicao === false) {    /*se nao existe adiciona */
                array_push($agenciasuspeita1, $dados1);
            }else {  /* se existe aumenta apenas a quantidade */
                
                $agenciasuspeita1[$posicao]['Soma'] += $dados1['Soma'];
            }

        } 

        
        $agenciasuspeitatotal = array();

        foreach($agenciasuspeita1 as $suspeita ) {
            $soma = $suspeita['Soma'];
            if($soma > 1000000000) {
                array_push($agenciasuspeitatotal, $suspeita);
            }
        }

        var_dump($agenciasuspeitatotal);
        exit();
