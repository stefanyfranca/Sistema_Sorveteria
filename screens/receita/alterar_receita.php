<?php
       $id_receita = $_POST['id_receita'];
       $nome   = $_POST['nome'];
       $descricao  = $_POST['descricao'];
       $tempo_preparo  = $_POST['tempo_preparo'];
       $quantidade_produzida  = $_POST['quantidade_produzida'];
       $custo_total  = $_POST['custo_total'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "update receita set nome = '$nome', descricao = '$descricao', tempo_preparo = '$tempo_preparo', quantidade_produzida = '$quantidade_produzida', custo_total = '$custo_total'
    where id_receita = '$id_receita';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='main_receita.php'";
	?>
</script>