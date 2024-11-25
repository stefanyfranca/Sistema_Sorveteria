<?php
    $id_insumo = $_POST['id_insumo'];
    
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
    $sql       = "delete from insumo WHERE
    id_insumo = '$id_insumo';";
    $resultado = mysql_query($sql);
    echo 'Excluido com Sucesso!';
    }
    else{
        echo 'Exclusão recusada: O insumo está sendo utilizado em uma receita!';
    }

?>

