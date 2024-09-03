<?php
    $id_receita = $_POST['id_receita'];
    $nome   = $_POST['nome'];
    $descricao  = $_POST['descricao'];
    $tempo_preparo  = $_POST['tempo_preparo'];
    $quantidade_produzida  = $_POST['quantidade_produzida'];
    $custo_total  = $_POST['custo_total'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "insert into receita (id_receita,nome,descricao,tempo_preparo,quantidade_produzida,custo_total) values ('$id_receita','$nome','$descricao','$tempo_preparo','$quantidade_produzida','$custo_total')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='main_receita.php'";
	?>
</script>