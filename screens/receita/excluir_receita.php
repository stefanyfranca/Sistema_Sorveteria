<?php
    $id_receita = $_POST['id_receita'];
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from receita WHERE
    id_receita = '$id_receita';";
    $resultado = mysql_query($sql);
    
    if($resultado == 1){
        echo 'Excluido com Sucesso!';
    }
    else{
        echo 'exclusão recusada: A receita está sendo utilizada em um produto!';
    }

?>

