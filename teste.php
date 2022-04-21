<?php

    

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