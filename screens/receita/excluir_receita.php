<?php
    $id_receita = $_GET['id_receita'];
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from receita WHERE
    id_receita = '$id_receita';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('excluido com Sucesso!');
	<?php
		echo "location.href='main_receita.php'";
	?>
</script>