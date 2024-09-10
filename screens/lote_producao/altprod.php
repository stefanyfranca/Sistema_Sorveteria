<?php
    $id_lote_producao = $_POST['id_lote_producao'];
    $id_receita_lote   = $_POST['id_receita_lote'];
    $id_funcionario_lote  = $_POST['id_funcionario_lote'];
    $quantidade_produzida  = $_POST['quantidade_produzida'];
    $observacoes  = $_POST['observacoes'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "update lote_producao set id_receita_lote = '$id_receita_lote', id_funcionario_lote = '$id_funcionario_lote', quantidade_produzida = '$quantidade_produzida', observacoes = '$observacoes' where id_lote_producao = '$id_lote_producao';";        
    $resultado = mysql_query($sql);
?>

<script>
	alert('Alterado com Sucesso!');
	<?php
		echo "location.href='cadastro_lote_producao.php'";
	?>
</script>