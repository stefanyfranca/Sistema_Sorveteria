<?php
    $id_lote_producao = $_GET['id_lote_producao'];
   
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from lote_producao where id_lote_producao = '$id_lote_producao';";        
    $resultado = mysql_query($sql);
?>

<script>
	alert('Excluido com Sucesso!');
	<?php
		echo "location.href='main_lote_producao.php'";
	?>
</script>