<?php
    $id_produto = $_POST['id_produto'];
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

    $produtosA = array();

    $produtoSelect = "SELECT id_produto_processo FROM processo_fabricacao";
    $produtoQuery = mysql_query($produtoSelect);
    while($produtos = mysql_fetch_array($produtoQuery)){
        $produto = $produtos['id_produto_processo'];
        array_push($produtosA, $produto);
    }

    if(in_array($id_produto, $produtosA)){
        echo 'Exclusão recusada: O produto está registrado em fabricação!';
    }
    else{
        $sql       = "delete from produto WHERE
        id_produto = '$id_produto';";
        $resultado = mysql_query($sql);
        echo 'Excluído com Sucesso!';
    }
?>

