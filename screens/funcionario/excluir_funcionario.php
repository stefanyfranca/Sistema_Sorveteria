<?php
    $cpf = $_GET['cpf'];
   
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from funcionario where cpf = '$cpf';";        
    $resultado = mysql_query($sql);
?>

<script>
	alert('Excluido com Sucesso!');
	<?php
		echo "location.href='main_funcionario.php'";
	?>
</script>