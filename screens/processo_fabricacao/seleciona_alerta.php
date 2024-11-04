<?php 
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

    $id_produto = $_POST['id_produto'];

    $indexID = 0;
    $indexQuant = 1;

    $saida = 0;

    $query = mysql_query("SELECT id_receita_produto FROM produto WHERE id_produto = $id_produto");
    $fetch = mysql_fetch_array($query);

    $id_receita = $fetch["id_receita_produto"];

    $query = mysql_query("SELECT insumos_utilizados FROM receita WHERE id_receita = $id_receita");
    $fetch = mysql_fetch_array($query);

    $string_insumos = $fetch["insumos_utilizados"];

    $insumos = explode("*", $string_insumos);

    $repeticoes = count($insumos) / 2;

    for ($i = 1; $i <= $repeticoes; $i++){
        $id_insumo = $insumos[$indexID];
        $quantidade_retirar = $insumos[$indexQuant];

        $query = mysql_query("SELECT quantidade_estoque FROM insumo WHERE id_insumo = $id_insumo");
        $fetch = mysql_fetch_array($query);
        $quantidade_estoque = $fetch["quantidade_estoque"];

        if ($quantidade_estoque < $quantidade_retirar){
            $saida = 1;
            break;
        }

        else{
            $saida = 0;
        }

        $indexID += 2;
        $indexQuant += 2;
    }

    echo $saida;
?>