<?php 
$idreceita = (empty($_POST['idreceita']))?'null':$_POST['idreceita'];
$quantidade = (empty($_POST['quantidade']))?'null':$_POST['quantidade'];

$conectar  = mysql_connect('localhost','root','');
$db        = mysql_select_db('frangelato');

if(($idreceita <> 'null') and ($quantidade <> 'null')){

$custoSelect = "SELECT custo_total FROM receita WHERE id_receita = '$idreceita'";
$custoQuery = mysql_query($custoSelect);
while($custos = mysql_fetch_array($custoQuery)){
    $custo = $custos['custo_total'];
}


$custoreal = $quantidade * $custo;

echo $custoreal;

}
else{
echo '';
}
?>