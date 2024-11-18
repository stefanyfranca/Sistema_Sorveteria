<?php
    $id_equipamento = $_POST['id_equipamento'];
    $nome   = $_POST['nome'];
    $descricao  = $_POST['descricao'];
    $data_aquisicao  = $_POST['data_aquisicao'];
    $status  = $_POST['status'];
    $ultima_manutencao  = $_POST['ultima_manutencao'];
    $id_fornecedor  = $_POST['id_fornecedor'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "update equipamento set nome = '$nome', descricao = '$descricao', data_aquisicao = '$data_aquisicao', status = '$status', ultima_manutencao = '$ultima_manutencao', id_fornecedor = '$id_fornecedor'
    where id_equipamento = '$id_equipamento';";
    $resultado = mysql_query($sql);
?>

