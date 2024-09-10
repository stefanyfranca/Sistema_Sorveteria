<?php
    $nome   = $_POST['nome'];
    $unidade_medida  = $_POST['unidade_medida'];
    $custo_unitario  = $_POST['custo_unitario'];
    $data_validade  = $_POST['data_validade'];
    $id_fornecedor_insumo  = $_POST['id_fornecedor_insumo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "insert into insumo (nome,unidade_medida,custo_unitario,data_validade,id_fornecedor_insumo) 
                              values ('$nome','$unidade_medida','$custo_unitario','$data_validade','$id_fornecedor_insumo')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		
	?>
</script>