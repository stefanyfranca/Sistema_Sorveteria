<?php
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $unidade_medida  = $_POST['unidade_medida'];
    $custo_unitario  = $_POST['custo_unitario'];
    $data_validade  = $_POST['data_validade'];
    $id_fornecedor_insumo  = $_POST['id_fornecedor_insumo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "insert into insumo (codigo,nome,unidade_medida,custo_unitario,data_validade,,id_fornecedor_insumo) values ('$codigo','$nome','$unidade_medida','$custo_unitario','$data_validade','$','$id_fornecedor_insumo')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='main_insumo.php'";
	?>
</script>