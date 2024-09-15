<?php
    $id_processo = $_GET['id_processo'];
   
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from processo_fabricacao where id_processo = '$id_processo';";        
    $resultado = mysql_query($sql);
?>

<script>
	alert('Excluido com Sucesso!');
	<?php
		echo "location.href='main_fabricacao.php'";
	?>
</script>