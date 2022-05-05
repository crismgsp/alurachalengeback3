<?php

    $mysql = new mysqli('localhost', 'root', '','csv');
    $mysql-> set_charset('utf8');

    if($mysql == FALSE) {
        echo "Erro na conexao";
    } 


    
        

    
        $mesescolhido = 5;

        $query= ("SELECT BancoOrigem, AgenciaOrigem, ContaOrigem, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY ContaOrigem, BancoOrigem, AgenciaOrigem"); 
        
        $resultado = mysqli_query($mysql, $query);
             
        $dadosconta = $resultado->fetch_all(MYSQLI_ASSOC);

        $query =("SELECT BancoDestino, AgenciaDestino, ContaDestino, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY ContaDestino, BancoDestino, AgenciaDestino");

        $resultado2 = mysqli_query($mysql, $query);

        $dadosconta2 = $resultado2->fetch_all(MYSQLI_ASSOC);


        /* checar os valores de todas contas tentar agrupar por conta de alguma forma observando os dados de agencia, banco e numero conta e 
        fazer uma soma dos valores mensais*/

        $contasuspeita = array();

        foreach($dadosconta as $dados) {
            $soma = $dados['Soma'];

            if($soma > 1000000) {
                array_push($contasuspeita, $dados);
            }
        }    

        foreach($dadosconta2 as $dados2) {
            $soma2 = $dados2['Soma'];
    
            if($soma2 > 1000000) {
                array_push($contasuspeita, $dados2);
            }    
        }

        

        var_dump($contasuspeita);
        exit();
?>        

array(1) { [0]=> array(4) { ["BancoDestino"]=> string(14) "BANCO BRADESCO" 
    ["AgenciaDestino"]=> string(1) "1" ["ContaDestino"]=> string(1) "1" ["Soma"]=> string(7) "1300000" } }