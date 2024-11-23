<?php
    $cpf = $_POST['cpf'];
    $nome   = $_POST['nome'];
    $tipo  = $_POST['tipo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "update funcionario set nome = '$nome', tipo = '$tipo' where cpf = '$cpf';";        
    $resultado = mysql_query($sql);
?>

