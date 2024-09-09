<?php
    $cpf = $_POST['cpf'];
    $nome   = $_POST['nome'];
    $salario  = $_POST['salario'];
    $tipo  = $_POST['tipo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "update funcionario set nome = '$nome', salario = '$salario', tipo = '$tipo' where cpf = '$cpf';";        
    $resultado = mysql_query($sql);
?>

<script>
	alert('Alterado com Sucesso!');
	<?php
		echo "location.href='main_funcionario.php'";
	?>
</script>