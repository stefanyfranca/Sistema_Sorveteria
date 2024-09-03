<?php
    $id_ingrediente = $_POST['id_ingrediente'];
    $nome   = $_POST['nome'];
    $id_receita_receita  = $_POST['id_receita_receita'];
    $id_insumo_receita  = $_POST['id_insumo_receita'];
    $quantidade_necessaria  = $_POST['quantidade_necessaria'];
    $custo_fabricacao  = $_POST['custo_fabricacao'];
    $unidade_medida  = $_POST['unidade_medida'];
    $observacoes  = $_POST['observacoes'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "update ingrediente_receita set nome = '$nome', id_receita_receita = '$id_receita_receita', id_insumo_receita = '$id_insumo_receita', quantidade_necessaria = '$quantidade_necessaria', custo_fabricacao = '$custo_fabricacao', unidade_medida = '$unidade_medida', observacoes = '$observacoes'
    where id_ingrediente = '$id_ingrediente';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='main_ingrediente.php'";
	?>
</script>