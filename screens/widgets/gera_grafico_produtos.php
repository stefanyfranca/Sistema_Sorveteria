<?php

$datainicial = (empty($_POST['datainicial']))?'null':$_POST['datainicial'];
$datafinal = (empty($_POST['datafinal']))?'null':$_POST['datafinal'];


$conectar  = mysql_connect('localhost','root','');
$db        = mysql_select_db('frangelato');

$produtosA = array();
$produtosFabricadosA = array();
$quantidadesA = array();

$produtosFnomeA = array();
$quantidadesEnviar = array();

//ids dos insumos
$produtoSelect = "SELECT id_produto FROM produto";
$produtoQuery = mysql_query($produtoSelect);
while($produtos = mysql_fetch_array($produtoQuery)){
    $produto = $produtos['id_produto'];
    array_push($produtosA, $produto);
    }



    if (($datainicial == 'null') and ($datafinal == 'null')){
$produtoFabricadoSelect = "SELECT id_produto_processo FROM processo_fabricacao";
$produtoFabricadoQuery = mysql_query($produtoFabricadoSelect);
while($produtosFabricados = mysql_fetch_array($produtoFabricadoQuery)){
    $produtoFabricado = $produtosFabricados['id_produto_processo'];
    array_push($produtosFabricadosA, $produtoFabricado);
    }

$quantidadeSelect = "SELECT quantidade FROM processo_fabricacao";
$quantidadeQuery = mysql_query($quantidadeSelect);
while($quantidades = mysql_fetch_array($quantidadeQuery)){
    $quantidade = $quantidades['quantidade'];
    array_push($quantidadesA, $quantidade);
    }
}

if (($datainicial <> 'null') and ($datafinal == 'null')){
    $produtoFabricadoSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE data_fabricacao = '$datainicial'";
    $produtoFabricadoQuery = mysql_query($produtoFabricadoSelect);
    while($produtosFabricados = mysql_fetch_array($produtoFabricadoQuery)){
        $produtoFabricado = $produtosFabricados['id_produto_processo'];
        array_push($produtosFabricadosA, $produtoFabricado);
        }
    
    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE data_fabricacao = '$datainicial'";
    $quantidadeQuery = mysql_query($quantidadeSelect);
    while($quantidades = mysql_fetch_array($quantidadeQuery)){
        $quantidade = $quantidades['quantidade'];
        array_push($quantidadesA, $quantidade);
        }
    }

    if (($datainicial == 'null') and ($datafinal <> 'null')){
        $produtoFabricadoSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE data_fabricacao = '$datafinal'";
        $produtoFabricadoQuery = mysql_query($produtoFabricadoSelect);
        while($produtosFabricados = mysql_fetch_array($produtoFabricadoQuery)){
            $produtoFabricado = $produtosFabricados['id_produto_processo'];
            array_push($produtosFabricadosA, $produtoFabricado);
            }
        
        $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE data_fabricacao = '$datafinal'";
        $quantidadeQuery = mysql_query($quantidadeSelect);
        while($quantidades = mysql_fetch_array($quantidadeQuery)){
            $quantidade = $quantidades['quantidade'];
            array_push($quantidadesA, $quantidade);
            }
        }
    
        if (($datainicial <> 'null') and ($datafinal <> 'null')){
            $produtoFabricadoSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE data_fabricacao >= '$datainicial' AND data_fabricacao <= '$datafinal'";
            $produtoFabricadoQuery = mysql_query($produtoFabricadoSelect);
            while($produtosFabricados = mysql_fetch_array($produtoFabricadoQuery)){
                $produtoFabricado = $produtosFabricados['id_produto_processo'];
                array_push($produtosFabricadosA, $produtoFabricado);
                }
            
            $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE data_fabricacao >= '$datainicial' AND data_fabricacao <= '$datafinal'";
            $quantidadeQuery = mysql_query($quantidadeSelect);
            while($quantidades = mysql_fetch_array($quantidadeQuery)){
                $quantidade = $quantidades['quantidade'];
                array_push($quantidadesA, $quantidade);
                }
            }

            $produtosFabricadosA = array_reverse($produtosFabricadosA);

foreach($produtosA as $id){
    $contador = 0;
    $quantidadeAdd = 0;
    foreach($produtosFabricadosA as $idF){
        if($id == $idF){
            $produtoFnomeSelect = "SELECT nome FROM produto where id_produto = '$idF'";
            $produtoFnomeQuery = mysql_query($produtoFnomeSelect);
            while($produtosFnomes = mysql_fetch_array($produtoFnomeQuery)){
            $produtoFnome = $produtosFnomes['nome'];
            if(!in_array($produtoFnome, $produtosFnomeA)){
            array_push($produtosFnomeA, $produtoFnome);
                }
            $quantidadeAdd += $quantidadesA[$contador];
            $contador += 1;
            }
        }
        else{
            $contador += 1;
        }
    }
    if($quantidadeAdd > 0){
    array_push($quantidadesEnviar, $quantidadeAdd);
    }
}

    $enviar = array($produtosFnomeA,$quantidadesEnviar);

    echo json_encode($enviar);

?>