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

        /*$dadostotais = array_merge($dadosconta, $dadosconta2); */ 

        $obterdadosindividuais = function($dadostotais) {
            return $dadostotais['Banco']['Agencia']['Conta']['Soma'];
        };

       /*var_dump($dadostotais);
        exit();

        este teste acima retornou um array com 8 arrays 

        $contasuspeita = array();
        array_push($contasuspeita, $dadostotais[0]); */

       $contasuspeita1 = $dadosconta;

        foreach($dadosconta2 as $dados1) {
            $posicao = $contasuspeita1['Banco']['Agencia']['Conta'];
            if (in_array($posicao, $contasuspeita1)) {    /*se nao existe adiciona */
                array_push($contasuspeita1, $dados1);
            }else {  /* se nao existe aumenta apenas a quantidade */
                $contasuspeita1[$posicao]['Soma'] += $dados1['Soma'];
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
        


          /*for($i = 0; $i < count($dadostotais); $i++) {
            $codigo = $dadostotais[$i]['Banco'] && $dadostotais[$i]['Agencia'] && $dadostotais[$i]['Conta'];
            if(array_key_exists($codigo, $arrayfinal)){
                $arrayfinal[$codigo]['Soma'] += $dadostotais[$i]['Soma'];
                continue;
            } 
            $arrayfinal[$codigo] = array("codigo" -> $codigo, "Soma"->$dadostotais[$i]['Soma']);

        }
        unset($dadostotais);

        var_dump($arrayfinal);
        exit();   achei que ia somar so os que tem chave igual mas somou tudo */

        var_dump($contasuspeita);
        exit(); 
?>        