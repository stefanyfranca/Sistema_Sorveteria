<?php
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

    $nome   = $_POST['nome'];
    $descricao  = $_POST['descricao'];
    $tempo_preparo  = $_POST['tempo_preparo'];
    $quantidade_produzida  = $_POST['quantidade_produzida'];
    $custo_total = 0;

    for ($i = 0; $i <= 30; $i++) {
        if (isset($_POST["insumo$i"])){
            $insumo = $_POST["insumo$i"];
            $gramas = $_POST["quantidade_insumo$i"];
            $query = mysql_query("SELECT custo_unitario FROM insumo WHERE id_insumo = $insumo");
            $fetch = mysql_fetch_array($query);
            $custo_total += $gramas * $fetch["custo_unitario"];
        }
    }
    
    $sql       = "insert into receita (nome,descricao,tempo_preparo,quantidade_produzida,custo_total) values ('$nome','$descricao','$tempo_preparo','$quantidade_produzida','$custo_total')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='main_receita.php'";
	?>
</script>