<?php
    $id_ingrediente = $_GET['id_ingrediente'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from ingrediente_receita WHERE
    id_ingrediente = '$id_ingrediente';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('excluido com Sucesso!');
	<?php
		echo "location.href='main_ingrediente.php'";
	?>
</script>