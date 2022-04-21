<?php


public function validacsv() : return void

{
    $mysql = new mysqli('localhost', 'root', '', 'csv');
    $mysql-> set_charset('utf8');

    $arquivo = $_FILES["file"]["tmp_name"];
    $nome = $_FILES["file"]["name"];

    $ext = explode(".", $nome);

    $extensao = end($ext);

    if($extensao != "csv") {
        echo "Extensao invalida";
    }
    elseif{
        $objeto = fopen($arquivo, 'r');

        $tabela = fgetcsv($objeto, 1000, ",");
       
        foreach ($tabela as $conferenulos) {
          
            if ($conferenulos === NULL){
                echo "Há dados nulos no arquivo, corrija antes de inserir";
            }else{
                return $object;
            }
      
        }

}




?>