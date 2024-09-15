<?php
    $id_processo = $_POST['id_processo'];
    $id_receita_processo   = $_POST['id_receita_processo'];
    $data_fabricacao  = $_POST['data_fabricacao'];
    $sequencia_processo  = $_POST['sequencia_processo'];
    $descricao_processo  = $_POST['descricao_processo'];
    $tempo_execucao  = $_POST['tempo_execucao'];
    $quantidade  = $_POST['quantidade'];
    $id_equipamento_processo  = $_POST['id_equipamento_processo'];
    $id_funcionario_processo  = $_POST['id_funcionario_processo'];
    $id_produto_processo  = $_POST['id_produto_processo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "update processo_fabricacao set id_receita_processo = '$id_receita_processo', data_fabricacao = '$data_fabricacao', sequencia_processo = '$sequencia_processo', descricao_processo = '$descricao_processo' , tempo_execucao = '$tempo_execucao', quantidade = '$quantidade', id_equipamento_processo = '$id_equipamento_processo', id_funcionario_processo = '$id_funcionario_processo', id_produto_processo = '$id_produto_processo' where id_processo = '$id_processo';";        
    $resultado = mysql_query($sql);
?>

<script>
	alert('Alterado com Sucesso!');
	<?php
		echo "location.href='main_fabricacao.php'";
	?>
</script>