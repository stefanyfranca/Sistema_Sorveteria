<?php
    $id_produto = $_GET['id_produto'];
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from produto WHERE
    id_produto = '$id_produto';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('excluido com Sucesso!');
	<?php
		echo "location.href='main_produto.php'";
	?>
</script>