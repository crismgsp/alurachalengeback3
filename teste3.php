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

        /*$dadostotais = array_merge($dadosconta, $dadosconta2);

        var_dump($dadostotais);
        exit(); */

        $dadostotaiscomrepeticao = array_merge($dadosconta, $dadosconta2); 
        $dadostotaiscomrepeticao2 = array_merge($dadosconta, $dadosconta2); 

        $dadostotais = $dadostotaiscomrepeticao + $dadostotaiscomrepeticao2; 

        /*$dadostotais = $dadosconta + $dadosconta2;  fiz isso e parece que so retorna as que tem nome de banco em comum nas 2 consultas */

        
        
        $contasuspeita = array();


        
        foreach($dadostotais as $dados) {
            $soma = $dados['Soma'];

            if($soma > 1000000) {
                array_push($contasuspeita, $dados);
            }
        }
        

        


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