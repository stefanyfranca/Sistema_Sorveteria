<?php
    $id_fornecedor = $_POST['id_fornecedor'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from fornecedor WHERE
    id_fornecedor = '$id_fornecedor';";
    $resultado = mysql_query($sql);

    if($resultado == 1){
        echo 'Excluido com Sucesso!';
    }
    else{
        echo 'exclusão recusada: O item está sendo utilizado!';
    }
?>


