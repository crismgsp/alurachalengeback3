<?php

    $arquivo = array(nome,site,telefone,idade 
    Gabriel,www.mestredev.com.br,333333333,25 
    João,www.site-exemplo-joao.com.br,444444444,30 
    Maria,www.site-exemplo-maria.com.br,55555555,25);

        $objeto = fopen($arquivo, 'r');

        $tabela = fgetcsv($objeto, 1000, ",");
                   
        $lista1 = array();

        foreach ($tabela as $conferenulos) {
          
            if ($conferenulos !== NULL){
                $lista1[] = $conferenulos;
            }
        }

        echo "$lista1";

?>        