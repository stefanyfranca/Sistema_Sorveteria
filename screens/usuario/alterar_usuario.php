<?php
    $cpf = $_POST['cpf'];
    $nome   = $_POST['nome'];
    $senha  = $_POST['senha'];
    $tipo  = $_POST['tipo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "update usuario set nome = '$nome', senha = '$senha', tipo = '$tipo' where cpf = '$cpf';";        
    $resultado = mysql_query($sql);
?>
