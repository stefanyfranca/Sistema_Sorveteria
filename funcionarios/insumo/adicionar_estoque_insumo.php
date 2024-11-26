<?php
    $id_insumo = $_POST['id_insumo'];
    $quantidade_adicionar   = $_POST['quantidade_adicionar'];


    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

    $query = mysql_query("SELECT quantidade_estoque FROM insumo WHERE id_insumo = $id_insumo");
    $fetch = mysql_fetch_array($query);
    $quantidade_adicionar += $fetch["quantidade_estoque"];

    $sql       = "update insumo set quantidade_estoque = '$quantidade_adicionar' where id_insumo = '$id_insumo';";
    $resultado = mysql_query($sql);
?>

