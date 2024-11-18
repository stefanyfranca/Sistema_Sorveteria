<?php 
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $saida = "";

    $query = mysql_query("SELECT id_insumo, nome, quantidade_estoque FROM insumo");

     while($fetch = mysql_fetch_array($query)){
        $quantidade_estoque = $fetch["quantidade_estoque"];

        if ($quantidade_estoque < 500){
            $nome = $fetch["nome"];
            $saida .= "".$nome." ,";
        }
    }

    echo $saida;
?>