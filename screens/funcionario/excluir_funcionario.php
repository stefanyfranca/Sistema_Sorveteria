<?php
    $cpf = $_POST['cpf'];
   
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');
    $sql       = "delete from funcionario where cpf = '$cpf';";        
    $resultado = mysql_query($sql);

    if($resultado == 1){
        echo 'Excluido com Sucesso!';
    }
    else{
        echo 'exclusão recusada: O item está sendo utilizado!';
    }
?>

