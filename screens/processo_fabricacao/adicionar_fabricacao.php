<?php
    $data_fabricacao   = $_POST['data_fabricacao'];
    $sequencia_processo  = $_POST['sequencia_processo'];
    $descricao_processo  = $_POST['descricao_processo'];
    $tempo_execucao  = $_POST['tempo_execucao'];
    $quantidade  = $_POST['quantidade'];
    $id_equipamento_processo  = $_POST['id_equipamento_processo'];
    $id_funcionario_processo  = $_POST['id_funcionario_processo'];
    $id_produto_processo  = $_POST['id_produto_processo'];

    $indexID = 0;
    $indexQuant = 1;
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

    $query = mysql_query("SELECT quantidade_receita FROM produto WHERE id_produto = $id_produto_processo");
    $fetch = mysql_fetch_array($query);

    $quantidadeReceita = $fetch["quantidade_receita"];

    $query = mysql_query("SELECT id_receita_produto FROM produto WHERE id_produto = $id_produto_processo");
    $fetch = mysql_fetch_array($query);

    $id_receita = $fetch["id_receita_produto"];

    $query = mysql_query("SELECT insumos_utilizados FROM receita WHERE id_receita = $id_receita");
    $fetch = mysql_fetch_array($query);

    $string_insumos = $fetch["insumos_utilizados"];

    $insumos = explode("*", $string_insumos);

    $repeticoes = count($insumos) / 2;

    for ($i = 1; $i <= $repeticoes; $i++){
        $id_insumo = $insumos[$indexID];
        $quantidade_retirar = $insumos[$indexQuant];
        $quantidade_retirar = $quantidade_retirar * $quantidade * $quantidadeReceita;

        $query = mysql_query("SELECT quantidade_estoque FROM insumo WHERE id_insumo = $id_insumo");
        $fetch = mysql_fetch_array($query);
        $quantidade_retirar = $fetch["quantidade_estoque"] - $quantidade_retirar;
        $sql       = "update insumo set quantidade_estoque = '$quantidade_retirar' where id_insumo = '$id_insumo';";
        $resultado = mysql_query($sql);

        $indexID += 2;
        $indexQuant += 2;
    }

    

    $sql       = "insert into processo_fabricacao (data_fabricacao,sequencia_processo,descricao_processo,tempo_execucao,quantidade,id_equipamento_processo,id_funcionario_processo,id_produto_processo) values ('$data_fabricacao','$sequencia_processo','$descricao_processo','$tempo_execucao','$quantidade','$id_equipamento_processo','$id_funcionario_processo','$id_produto_processo')";
    $resultado = mysql_query($sql);

    $query = mysql_query("SELECT quantidade_estoque FROM produto WHERE id_produto = $id_produto_processo");
    $fetch = mysql_fetch_array($query);
    $quantidade += $fetch["quantidade_estoque"];

    $sql       = "update produto set quantidade_estoque = '$quantidade' where id_produto = '$id_produto_processo';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='main_fabricacao.php'";
	?>
</script>