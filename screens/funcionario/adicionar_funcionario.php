<?php
    $cpf = $_POST['cpf'];
    $nome   = $_POST['nome'];
    $tipo  = $_POST['tipo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "insert into funcionario (cpf,nome,tipo) values ('$cpf','$nome','$tipo')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='main_funcionario.php'";
	?>
</script>