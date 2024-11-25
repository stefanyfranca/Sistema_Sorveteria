<?php
    $id_insumo = $_POST['id_insumo'];
    $quantidade_retirar   = $_POST['quantidade_retirar'];


    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

    $query = mysql_query("SELECT quantidade_estoque FROM insumo WHERE id_insumo = $id_insumo");
    $fetch = mysql_fetch_array($query);
    $quantidade_retirar = $fetch["quantidade_estoque"] - $quantidade_retirar;

    $sql       = "update insumo set quantidade_estoque = '$quantidade_retirar' where id_insumo = '$id_insumo';";
    $resultado = mysql_query($sql);
?>

