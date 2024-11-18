<?php
    $id_fornecedor = $_GET['id_fornecedor'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from fornecedor WHERE
    id_fornecedor = '$id_fornecedor';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('excluido com Sucesso!');
	<?php
		echo "location.href='main_fornecedor.php'";
	?>
</script>