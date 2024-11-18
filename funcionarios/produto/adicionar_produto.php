<?php
    $nome   = $_POST['nome'];
    $descricao  = $_POST['descricao'];
    $custo_venda  = $_POST['custo_venda'];
    $quantidade_receita  = $_POST['quantidade_receita'];
    $id_receita_produto  = $_POST['id_receita_produto'];
    $custo_total_produto  = $_POST['custo_total_produto'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "insert into produto (nome,descricao,custo_venda,quantidade_receita,id_receita_produto,custo_total_produto) values ('$nome','$descricao','$custo_venda','$quantidade_receita','$id_receita_produto','$custo_total_produto')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='main_produto.php'";
	?>
</script>