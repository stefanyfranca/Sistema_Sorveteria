<?php
    $nome   = $_POST['nome'];
    $descricao  = $_POST['descricao'];
    $data_aquisicao  = $_POST['data_aquisicao'];
    $status  = $_POST['status'];
    $ultima_manutencao  = $_POST['ultima_manutencao'];
    $id_fornecedor  = $_POST['id_fornecedor'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "insert into equipamento (nome,descricao,data_aquisicao,status,ultima_manutencao,id_fornecedor) values ('$nome','$descricao','$data_aquisicao','$status','$ultima_manutencao','$id_fornecedor')";
    $resultado = mysql_query($sql);
?>

