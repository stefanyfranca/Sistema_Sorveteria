<?php
    $id_equipamento = $_POST['id_equipamento'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from equipamento WHERE
    id_equipamento = '$id_equipamento';";
    $resultado = mysql_query($sql);
?>

