<?php
    $nome   = $_POST['nome'];
    $cnpj  = $_POST['cnpj'];
    $endereco  = $_POST['endereco'];
    $cidade  = $_POST['cidade'];
    $estado  = $_POST['estado'];
    $pais  = $_POST['pais'];
    $telefone  = $_POST['telefone'];
    $email  = $_POST['email'];
    $observacoes  = $_POST['observacoes'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "insert into fornecedor (nome,cnpj,endereco,cidade,estado, pais, telefone, email, observacoes) values ('$nome','$cnpj','$endereco','$cidade','$estado','$pais','$telefone','$email','$observacoes')";
    $resultado = mysql_query($sql);
?>
