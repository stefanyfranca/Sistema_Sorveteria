<?php
    $id_fornecedor = $_POST['id_fornecedor'];
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
    $sql       = "update fornecedor set nome = '$nome', cnpj = '$cnpj', endereco = '$endereco', cidade = '$cidade', estado = '$estado', pais = '$pais', telefone = '$telefone', email = '$email', observacoes = '$observacoes' where id_fornecedor = '$id_fornecedor';";
    
    $resultado = mysql_query($sql);
?>
