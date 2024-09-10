<?php
    $id_insumo = $_POST['id_insumo'];
    $nome   = $_POST['nome'];
    $unidade_medida  = $_POST['unidade_medida'];
    $custo_unitario  = $_POST['custo_unitario'];
    $data_validade  = $_POST['data_validade'];
    $id_fornecedor_insumo  = $_POST['id_fornecedor_insumo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "update insumo set nome = '$nome', unidade_medida = '$unidade_medida', custo_unitario = '$custo_unitario', data_validade = '$data_validade', id_fornecedor_insumo = '$id_fornecedor_insumo'
    where id_insumo = '$id_insumo';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='main_insumo.php'";
	?>
</script>