<?php
    $id_produto = $_POST['id_produto'];
    $quantidade_adicionar   = $_POST['quantidade_adicionar'];


    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

    $query = mysql_query("SELECT quantidade_estoque FROM produto WHERE id_produto = $id_produto");
    $fetch = mysql_fetch_array($query);
    $quantidade_adicionar += $fetch["quantidade_estoque"];

    $sql       = "update produto set quantidade_estoque = '$quantidade_adicionar' where id_produto = '$id_produto';";
    $resultado = mysql_query($sql);
?>

