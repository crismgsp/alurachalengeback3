<?php

    require '../config.php';

    $arquivo = $_FILES["file"]["tmp_name"];
    $nome = $_FILES["file"]["name"];

    $ext = explode(".", $nome);

    $extensao = end($ext);

    if($extensao != "csv") {
        echo "Extensao invalida";
    }else{
        $objeto = fopen($arquivo, 'r');

        $primeiralinha = fgetcsv($objeto, 1000, ",");
        $primeiralinhadata = $primeiralinha[7];
        $dataehorap = explode("T", $primeiralinhadata);
        $datap = $dataehorap[0];

            while(($dados = fgetcsv($objeto, 1000, ",")) !== FALSE)
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
            }
    }

?>