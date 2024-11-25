<?php
    $id_insumo = $_POST['id_insumo'];
    $nome   = $_POST['nome'];
    $unidade_medida  = $_POST['unidade_medida'];
    $custo_unitario  = $_POST['custo_unitario'];
    $id_fornecedor_insumo  = $_POST['id_fornecedor_insumo'];

    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

    $insumosA = array();
    $utilizado = 0;
    $deverepetir = 0;

    $insumoSelect = "SELECT insumos_utilizados FROM receita";
    $insumoQuery = mysql_query($insumoSelect);
    while($insumos = mysql_fetch_array($insumoQuery)){
        $insumo = $insumos['insumos_utilizados'];
        array_push($insumosA, $insumo);
    }

    foreach($insumosA as $id){
        $contadorInsumo = 0;
        $conteudoReceita = explode("*", $id);
        $conta = count($conteudoReceita);
        $repeticoes = $conta / 2;
        if($deverepetir == 0){
        for($i = 1; $i <= $repeticoes; $i++){
            $insumoverifica = $conteudoReceita[$contadorInsumo];
            if($insumoverifica == $id_insumo){
                $utilizado = 1;
                $deverepetir = 1;
                break;
            }
            else{
            $contadorInsumo += 2;
            }
        }
      }
        else{
            break;
        }
    }

    
    if($utilizado == 0){
    $sql       = "update insumo set nome = '$nome', unidade_medida = '$unidade_medida', custo_unitario = '$custo_unitario', id_fornecedor_insumo = '$id_fornecedor_insumo'
    where id_insumo = '$id_insumo';";
    $resultado = mysql_query($sql);
    echo 'Alterado com Sucesso!';
    }
    else{
        echo 'Alteração recusada: O insumo está sendo utilizado em uma receita!';
    }
?>

