<?php
    $id_receita_lote = $_POST['id_receita_lote'];
    $id_funcionario_lote   = $_POST['id_funcionario_lote'];
    $quantidade_produzida  = $_POST['quantidade_produzida'];
    $data_validade  = $_POST['data_validade'];
    $observacoes  = $_POST['observacoes'];

    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "insert into lote_producao (id_receita_lote,id_funcionario_lote,quantidade_produzida,data_validade,observacoes) values ('$id_receita_lote','$id_funcionario_lote','$quantidade_produzida','$data_validade','$observacoes')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='cadastro_lote_producao.php'";
	?>
</script>