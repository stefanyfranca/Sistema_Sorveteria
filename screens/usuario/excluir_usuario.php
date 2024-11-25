<?php
    $cpf = $_POST['cpf'];
   
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from usuario where cpf = '$cpf';";        
    $resultado = mysql_query($sql);
?>

