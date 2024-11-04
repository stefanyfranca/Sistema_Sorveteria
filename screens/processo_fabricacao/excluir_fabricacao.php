<?php
    $id_processo = $_GET['id_processo'];
   
    $indexID = 0;
    $indexQuant = 1;

    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

    $query = mysql_query("SELECT id_produto_processo FROM processo_fabricacao WHERE id_processo = $id_processo");
    $fetch = mysql_fetch_array($query);

    $id_produto_processo = $fetch["id_produto_processo"];

    $query = mysql_query("SELECT id_receita_produto FROM produto WHERE id_produto = $id_produto_processo");
    $fetch = mysql_fetch_array($query);

    $id_receita = $fetch["id_receita_produto"];

    $query = mysql_query("SELECT insumos_utilizados FROM receita WHERE id_receita = $id_receita");
    $fetch = mysql_fetch_array($query);

    $string_insumos = $fetch["insumos_utilizados"];

    $insumos = explode("*", $string_insumos);

    $repeticoes = count($insumos) / 2;

    for ($i = 1; $i <= $repeticoes; $i++){
        $id_insumo = $insumos[$indexID];
        $quantidade_retirar = $insumos[$indexQuant];

        $query = mysql_query("SELECT quantidade_estoque FROM insumo WHERE id_insumo = $id_insumo");
        $fetch = mysql_fetch_array($query);
        $quantidade_retirar = $fetch["quantidade_estoque"] + $quantidade_retirar;
        $sql       = "update insumo set quantidade_estoque = '$quantidade_retirar' where id_insumo = '$id_insumo';";
        $resultado = mysql_query($sql);

        $indexID += 2;
        $indexQuant += 2;
    }





    $sql       = "delete from processo_fabricacao where id_processo = '$id_processo';";        
    $resultado = mysql_query($sql);
?>

<script>
	alert('Excluido com Sucesso!');
	<?php
		echo "location.href='main_fabricacao.php'";
	?>
</script>