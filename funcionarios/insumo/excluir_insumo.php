<?php
    $id_insumo = $_GET['id_insumo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from insumo WHERE
    id_insumo = '$id_insumo';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('excluido com Sucesso!');
	<?php
		echo "location.href='main_insumo.php'";
	?>
</script>