<?php
    $cpf = $_POST['cpf'];
    $nome   = $_POST['nome'];
    $senha  = $_POST['senha'];
    $tipo  = $_POST['tipo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "insert into usuario (cpf,nome,senha,tipo) values ('$cpf','$nome','$senha','$tipo')";
    $resultado = mysql_query($sql);
?>

