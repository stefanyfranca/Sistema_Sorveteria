<?php
       $id_produto = $_POST['id_produto'];
       $nome   = $_POST['nome'];
       $descricao  = $_POST['descricao'];
       $custo_venda  = $_POST['custo_venda'];
       $quantidade_receita  = $_POST['quantidade_receita'];
       $id_receita_produto  = $_POST['id_receita_produto'];
       $custo_total_produto  = $_POST['custo_total_produto'];
    
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
        echo 'Alteração recusada: O produto está registrado em fabricação!';
    }
    else{
        $sql       = "update produto set nome = '$nome', descricao = '$descricao', custo_venda = '$custo_venda', quantidade_receita = '$quantidade_receita', id_receita_produto = '$id_receita_produto', custo_total_produto = '$custo_total_produto'
        where id_produto = '$id_produto';";
        $resultado = mysql_query($sql);
        echo 'Alterado com Sucesso!';
    }
?>
