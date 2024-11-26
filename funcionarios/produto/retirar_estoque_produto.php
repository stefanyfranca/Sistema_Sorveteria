<?php
    $id_produto = $_POST['id_produto'];
    $quantidade_retirar   = $_POST['quantidade_retirar'];


    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

    $query = mysql_query("SELECT quantidade_estoque FROM produto WHERE id_produto = $id_produto");
    $fetch = mysql_fetch_array($query);
    $quantidade_retirar = $fetch["quantidade_estoque"] - $quantidade_retirar;

    $sql       = "update produto set quantidade_estoque = '$quantidade_retirar' where id_produto = '$id_produto';";
    $resultado = mysql_query($sql);
?>
