<?php
$conectar = mysql_connect('localhost','root','');
$db       = mysql_select_db('frangelato');
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html">
    <title>Pesquisa Lote Producao </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>



    <!--Modal Cadastrar-->
    <div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar um registro ...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="addprod.php" method="POST">
                        <input type="text" id="id_receita_lote" name="id_receita_lote" class="span3" value="" required placeholder="id_receita_lote" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="id_funcionario_lote" name="id_funcionario_lote" class="span3" value="" required placeholder="id_funcionario_lote" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="quantidade_produzida" name="quantidade_produzida" class="span3" value="" required placeholder="quantidade_produzida" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="data_validade" name="data_validade" class="span3" value="" required placeholder="data_validade" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="observacoes" name="observacoes" class="span3" value="" required placeholder="observacoes" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-success btn-large" name="cadastrar" style="height: 35px">Cadastrar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <!--Modal Alterar-->
    <div class="modal fade" id="myModalAlterar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h1>Alterar de Registro...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="altprod.php" method="POST">
                        id_lote_producao   <input id="id_lote_producao" type="text" name="id_lote_producao" value="" required>
                        id_receita_lote   <input id="id_receita_lote" type="text" name="id_receita_lote" value="" required>
                        id_funcionario_lote  <input id="id_funcionario_lote" type="text" name="id_funcionario_lote" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        quantidade_produzida <input id="quantidade_produzida" type="text" name="quantidade_produzida" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        data_validade<input type="text" id="data_validade" name="data_validade" class="span3" value="" required placeholder="data_validade" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        observacoes<input type="text" id="observacoes" name="observacoes" class="span3" value="" required placeholder="observacoes" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-success btn-large" name="alterar" style="height: 35px">Alterar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    


    <div class="container">
        <div class="row">

            <h2>Lista de Lote Producao: </h2><br>
            <form action="cadastro_lote_producao.php" method="POST">
                <input type="text" name="id" id="id" placeholder="id ..." class="span4" style="margin-bottom: -2px; height: 25px;">
                <button type="submit" name="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
                <a href="#myModalCadastrar">
                 <button type="button" name="cadastrar" class="btn btn-primary" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button></a>
            </form>
            <table border="1px" bordercolor="gray" class="table table-stripped">
                <tr>
                    <td><b>id_receita_lote</b></td>
                    <td><b>id_funcionario_lote</b></td>
                    <td><b>quantidade_produzida</b></td>
                    <td><b>data_validade</b></td>
                    <td><b>observacoes</b></td>
                    <td><b>Operacao</b></td>
                </tr>
                <?php
                if ((isset($_POST['pesquisar'])) or isset($_POST['cadastrar']))
                {
                
              	    $consulta = "select * from lote_producao";
              	    
                   	if ($_POST['id'] != '')
                   	{
						$consulta = $consulta." where id_lote_producao like '%".$_POST['id']."%'";
                    }
					
					$resultado = mysql_query($consulta);

					while ($dados = mysql_fetch_array($resultado))
                    {
						
				    ?>
                    <tr>
                        <td><?php echo $dados['id_lote_producao']; ?></td>
                        <td><?php echo $dados['id_receita_lote']; ?></td>
                        <td><?php echo $dados['id_funcionario_lote']; ?></td>
                        <td><?php echo $dados['quantidade_produzida']; ?></td>
                        <td><?php echo $dados['data_validade']; ?></td>
                        <td><?php echo $dados['observacoes']; ?></td>
                        <td>
							<?php 
								echo "<a href='excprod.php?id_lote_producao=".$dados['id_lote_producao']."'><button class='btn btn-danger' type='button' name='excluir'>Excluir</button></a>";
							?>

                            <a href="#myModalAlterar">
                                <button type='button' id='alterar' name='alterar' class='btn btn-primary' data-toggle='modal' data-target='#myModalAlterar'>Alterar</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
					mysql_close($conectar);
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Biblioteca requerida -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
