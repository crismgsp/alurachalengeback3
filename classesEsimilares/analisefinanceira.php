<?php

session_start();

require '../config.php';

class Analise
{
    private $mysql;
    
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function transacaoSuspeita(): array
    { 

        $mesescolhido = $_POST['selecao'];

        $resultado = $this->mysql->query("SELECT * FROM transacoes WHERE Mes = '$mesescolhido'");     
             
        $dadosconta = $resultado->fetch_all(MYSQLI_ASSOC);

        /* checar os valores de todas transacoes se for > que 100.000 armazena no $dadoscontas 
        depois tentar separar por mes para a pessoa poder filtrar*/

        $transacaosuspeita = array();

        foreach($dadosconta as $dados) {
            $valor = $dados['Valor'];
            if ($valor > 100000) {
                array_push($transacaosuspeita, $dados);
            }
        }

        return $transacaosuspeita;
    }


    public function contaSuspeita(): array
    { 

        $mesescolhido = $_POST['selecao'];    
        
        $resultado = $this->mysql->query("SELECT BancoOrigem as Banco, AgenciaOrigem as Agencia, ContaOrigem as Conta, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY ContaOrigem, BancoOrigem, AgenciaOrigem"); 
                  
        $dadosconta = $resultado->fetch_all(MYSQLI_ASSOC);

        
        $resultado2 = $this->mysql->query("SELECT BancoDestino as Banco, AgenciaDestino as Agencia, ContaDestino as Conta, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY ContaDestino, BancoDestino, AgenciaDestino");

        
        
        $dadosconta2 = $resultado2->fetch_all(MYSQLI_ASSOC); 

        

        $dadostotais = array_merge($dadosconta, $dadosconta2);  

     
        $contasuspeita = array();


        
        foreach($dadostotais as $dados) {
            $soma = $dados['Soma'];

            if($soma > 1000000) {
                array_push($contasuspeita, $dados);
            }
        }
        

        return $contasuspeita;
    }

    public function agenciaSuspeita(): array
    { 

        
        $mesescolhido = $_POST['selecao'];

        $resultado = $this->mysql->query("SELECT BancoOrigem, AgenciaOrigem, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY ContaOrigem, BancoOrigem, AgenciaOrigem");     
             
        $dadosconta = $resultado->fetch_all(MYSQLI_ASSOC);

        $resultado2 = $this->mysql->query("SELECT BancoDestino, AgenciaDestino, Sum(Valor) as Soma FROM transacoes WHERE Mes = '$mesescolhido' 
        GROUP BY ContaDestino, BancoDestino, AgenciaDestino");

        $dadosconta2 = $resultado2->fetch_all(MYSQLI_ASSOC);


        /* checar os valores de todas contas tentar agrupar por conta de alguma forma observando os dados de agencia, banco e numero conta e 
        fazer uma soma dos valores mensais*/

        $agenciasuspeita = array();

        foreach($dadosconta as $dados) {
            $soma = $dados['Soma'];

            array_push($agenciasuspeita, $dados);
            
        }    

        foreach($dadosconta2 as $dados2) {
            $soma = $dados['Soma'];
            array_push($agenciasuspeita, $dados2);
           
        }

        $agenciasuspeitatotal = array();

        foreach($agenciasuspeita as $suspeita ) {
            if($soma > 1000000000) {
                array_push($agenciasuspeitatotal, $dados2);
            }
        }

        
        return $agenciasuspeitatotal;
        
    }
   
}



