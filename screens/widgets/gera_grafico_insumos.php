<?php

$datainicial = (empty($_POST['datainicial']))?'null':$_POST['datainicial'];
$datafinal = (empty($_POST['datafinal']))?'null':$_POST['datafinal'];


$conectar  = mysql_connect('localhost','root','');
$db        = mysql_select_db('frangelato');

$insumosA = array(); //tenho
$insumosNome = array(); //tenho
$quantidadeFabricada = array(); //tenho
$infoReceitas = array(); //tenho
$quantidadesReceita = array();

$insumosNomeFabricado = array(); 
$quantidadeInsumoFabricado = array(); 

//ids dos insumos
$insumoSelect = "SELECT id_insumo FROM insumo";
$insumoQuery = mysql_query($insumoSelect);
while($insumos = mysql_fetch_array($insumoQuery)){
    $insumo = $insumos['id_insumo'];
    array_push($insumosA, $insumo);
    }

//nome dos insumos
foreach($insumosA as $id){
    $nomeSelect = "SELECT nome FROM insumo WHERE id_insumo = '$id'";
    $nomeQuery = mysql_query($nomeSelect);
    while($nomes = mysql_fetch_array($nomeQuery)){
    $nome = $nomes['nome'];
    array_push($insumosNome, $nome);
    }
    }
    
if (($datainicial <> 'null') and ($datafinal <> 'null')){
//quantidade fabricada no periodo
$quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE data_fabricacao >= '$datainicial' AND data_fabricacao <= '$datafinal'";
$quantidadeQuery = mysql_query($quantidadeSelect);
while($quantidades = mysql_fetch_array($quantidadeQuery)){
    $quantidade = $quantidades['quantidade'];
    array_push($quantidadeFabricada, $quantidade);
    }

//produtos fabricadas no periodo
$produtoFabricado = array();
$produtoSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE data_fabricacao >= '$datainicial' AND data_fabricacao <= '$datafinal'";
$produtoQuery = mysql_query($produtoSelect);
while($produtos = mysql_fetch_array($produtoQuery)){
    $produto = $produtos['id_produto_processo'];
    array_push($produtoFabricado, $produto);
    }
}

if (($datainicial == 'null') and ($datafinal == 'null')){
    //quantidade fabricada no periodo
    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao";
    $quantidadeQuery = mysql_query($quantidadeSelect);
    while($quantidades = mysql_fetch_array($quantidadeQuery)){
        $quantidade = $quantidades['quantidade'];
        array_push($quantidadeFabricada, $quantidade);
    }
    
    //produtos fabricadas no periodo
    $produtoFabricado = array();
    $produtoSelect = "SELECT id_produto_processo FROM processo_fabricacao";
    $produtoQuery = mysql_query($produtoSelect);
    while($produtos = mysql_fetch_array($produtoQuery)){
        $produto = $produtos['id_produto_processo'];
        array_push($produtoFabricado, $produto);
    }
}

if (($datainicial <> 'null') and ($datafinal == 'null')){
    //quantidade fabricada no periodo
    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE data_fabricacao = '$datainicial'";
    $quantidadeQuery = mysql_query($quantidadeSelect);
    while($quantidades = mysql_fetch_array($quantidadeQuery)){
        $quantidade = $quantidades['quantidade'];
        array_push($quantidadeFabricada, $quantidade);
    }
    
    //produtos fabricadas no periodo
    $produtoFabricado = array();
    $produtoSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE data_fabricacao = '$datainicial'";
    $produtoQuery = mysql_query($produtoSelect);
    while($produtos = mysql_fetch_array($produtoQuery)){
        $produto = $produtos['id_produto_processo'];
        array_push($produtoFabricado, $produto);
    }
}

if (($datainicial == 'null') and ($datafinal <> 'null')){
    //quantidade fabricada no periodo
    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE data_fabricacao = '$datafinal'";
    $quantidadeQuery = mysql_query($quantidadeSelect);
    while($quantidades = mysql_fetch_array($quantidadeQuery)){
        $quantidade = $quantidades['quantidade'];
        array_push($quantidadeFabricada, $quantidade);
    }
    
    //produtos fabricadas no periodo
    $produtoFabricado = array();
    $produtoSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE data_fabricacao = '$datafinal'";
    $produtoQuery = mysql_query($produtoSelect);
    while($produtos = mysql_fetch_array($produtoQuery)){
        $produto = $produtos['id_produto_processo'];
        array_push($produtoFabricado, $produto);
    }
}

//id receita do produto
$receitaFabricada = array();
foreach($produtoFabricado as $prod){
    $receitaSelect = "SELECT id_receita_produto FROM produto WHERE id_produto = '$prod'";
    $receitaQuery = mysql_query($receitaSelect);
    while($receitas = mysql_fetch_array($receitaQuery)){
        $receita = $receitas['id_receita_produto'];
        array_push($receitaFabricada, $receita);
        }
}

//quantidade fabricada de uma receita
foreach($produtoFabricado as $prod){
    $quantidadereceitaSelect = "SELECT quantidade_receita FROM produto WHERE id_produto = '$prod'";
    $quantidadereceitaQuery = mysql_query($quantidadereceitaSelect);
    while($quants = mysql_fetch_array($quantidadereceitaQuery)){
        $quant = $quants['quantidade_receita'];
        array_push($quantidadesReceita, $quant);
        }
}

//informação da receita
foreach($receitaFabricada as $rec){
    $idreceitaSelect = "SELECT insumos_utilizados FROM receita WHERE id_receita = '$rec'";
    $idreceitaQuery = mysql_query($idreceitaSelect);
    while($receitasI = mysql_fetch_array($idreceitaQuery)){
        $receitaI = $receitasI['insumos_utilizados'];
        array_push($infoReceitas, $receitaI);
        }
}

//coletando informações do grafico
$contadorNome = 0;
foreach($insumosA as $id){
    $contadorMultiplica = 0;
    $quantidadeInsumo = 0;
    $nomeReal = 0;
    foreach($infoReceitas as $info){
        $contadorInsumo = 0;
        $contadorQuantidade = 1;
        $conteudoReceita = explode("*", $info);
        $conta = count($conteudoReceita);
        $repeticoes = $conta / 2;
        for($i = 1; $i <= $repeticoes; $i++){
            $insumoReceita = $conteudoReceita[$contadorInsumo];
            $quantidadeReceita = $conteudoReceita[$contadorQuantidade];
            $multiplica = $quantidadeFabricada[$contadorMultiplica] * $quantidadesReceita[$contadorMultiplica];
            if($insumoReceita == $id){
                $quantidadeInsumo += $quantidadeReceita * $multiplica; 
            }
            $contadorInsumo += 2;
            $contadorQuantidade += 2;
        }
        $contadorMultiplica += 1;
    }
    if($quantidadeInsumo > 0){
        array_push($insumosNomeFabricado, $insumosNome[$contadorNome]);
        array_push($quantidadeInsumoFabricado, $quantidadeInsumo);
    }
    $contadorNome += 1;
}

    $enviar = array($insumosNomeFabricado,$quantidadeInsumoFabricado);

    echo json_encode($enviar);

?>