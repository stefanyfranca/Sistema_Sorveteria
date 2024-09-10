<?php
$conectar = mysql_connect('localhost','root','');
$db       = mysql_select_db('frangelato');
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html">
    <title>Pesquisa Processo Fabricacao </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>


    <script>
        
        /*
        Use o poder do jquery! 
        document.getElementById('id_receita_processo').value vira simplesmente $("#id_receita_processo").val() ;-)
        */

        function obterDadosModal(valor) {

            var retorno = valor.split("*");

            document.getElementById('id_receita_processo').value = retorno[0];
            document.getElementById('data_fabricacao').value = retorno[1];
            document.getElementById('sequencia_processo').value = retorno[2];
            document.getElementById('descricao_processo').value = retorno[3];
            document.getElementById('tempo_execucao').value = retorno[4];
            document.getElementById('quantidade').value = retorno[5];
            document.getElementById('id_equipamento_processo').value = retorno[6];
            document.getElementById('id_funcionario_processo').value = retorno[7];
            document.getElementById('id_produto_processo').value = retorno[8];
            

            
        }
    </script>
    <!--Modal Cadastrar-->
    <div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar um registro ...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="addfab.php" method="POST">
                        <input type="text" id="id_receita_processo" name="id_receita_processo" class="span3" value="" required placeholder="id_receita_processo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="data_fabricacao" name="data_fabricacao" class="span3" value="" required placeholder="data_fabricacao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="sequencia_processo" name="sequencia_processo" class="span3" value="" required placeholder="sequencia_processo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="descricao_processo" name="descricao_processo" class="span3" value="" required placeholder="descricao_processo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="tempo_execucao" name="tempo_execucao" class="span3" value="" required placeholder="tempo_execucao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="quantidade" name="quantidade" class="span3" value="" required placeholder="quantidade" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="id_equipamento_processo" name="id_equipamento_processo" class="span3" value="" required placeholder="id_equipamento_processo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="id_funcionario_processo" name="id_funcionario_processo" class="span3" value="" required placeholder="id_funcionario_processo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="id_produto_processo" name="id_produto_processo" class="span3" value="" required placeholder="id_produto_processo" style=" margin-bottom: -2px; height: 25px;"><br><br>
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
                    <form class="form-group well" action="altfab.php" method="POST">
                        id_processo   <input id="id_processo" type="text" name="id_processo" value="" required>
                        id_receita_processo   <input id="id_receita_processo" type="text" name="id_receita_processo" value="" required>
                        data_fabricacao  <input id="data_fabricacao" type="text" name="data_fabricacao" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        sequencia_processo <input id="sequencia_processo" type="text" name="sequencia_processo" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        descricao_processo<input type="text" id="descricao_processo" name="descricao_processo" class="span3" value="" required placeholder="descricao_processo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        tempo_execucao<input type="text" id="tempo_execucao" name="tempo_execucao" class="span3" value="" required placeholder="tempo_execucao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        quantidade<input type="text" id="quantidade" name="quantidade" class="span3" value="" required placeholder="quantidade" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        id_equipamentos_processo<input type="text" id="id_equipamento_processo" name="id_equipamento_processo" class="span3" value="" required placeholder="id_equipamento_processo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        id_funcionarios_processo<input type="text" id="id_funcionario_processo" name="id_funcionario_processo" class="span3" value="" required placeholder="id_funcionario_processo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        id_produto_processo<input type="text" id="id_produto_processo" name="id_produto_processo" class="span3" value="" required placeholder="id_produto_processo" style=" margin-bottom: -2px; height: 25px;"><br><br>
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

            <h2>Lista de Processo Fabricacao: </h2><br>
            <form action="cadastro_processo_fabricacao.php" method="POST">
                <input type="text" name="id" id="id" placeholder="id ..." class="span4" style="margin-bottom: -2px; height: 25px;">
                <button type="submit" name="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
                <a href="#myModalCadastrar">
                 <button type="button" name="cadastrar" class="btn btn-primary" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button></a>
            </form>
            <table border="1px" bordercolor="gray" class="table table-stripped">
                <tr>
                    <td><b>id_processo</b></td>
                    <td><b>id_receita_processo</b></td>
                    <td><b>data_fabricacao</b></td>
                    <td><b>sequencia_processo</b></td>
                    <td><b>descricao_processo</b></td>
                    <td><b>tempo_execucao</b></td>
                    <td><b>quantidade</b></td>
                    <td><b>id_equipamentos_processo</b></td>
                    <td><b>id_funcionarios_processo</b></td>
                    <td><b>id_produto_processo</b></td>
                    <td><b>Operacao</b></td>
                </tr>
                <?php
                if ((isset($_POST['pesquisar'])) or isset($_POST['cadastrar']))
                {
                
              	    $consulta = "select * from processo_fabricacao";
              	    
                   	if ($_POST['id'] != '')
                   	{
						$consulta = $consulta." where id_processo like '%".$_POST['id']."%'";
                    }
					
					$resultado = mysql_query($consulta);

					while ($dados = mysql_fetch_array($resultado))
                    {
						$strdados = $dados['id_receita_processo']."*".$dados['data_fabricacao']."*".$dados['sequencia_processo']."*".$dados['descricao_processo']."*".$dados['tempo_execucao'];
				    ?>
                    <tr>
                        <td><?php echo $dados['id_processo']; ?></td>
                        <td><?php echo $dados['id_receita_processo']; ?></td>
                        <td><?php echo $dados['data_fabricacao']; ?></td>
                        <td><?php echo $dados['sequencia_processo']; ?></td>
                        <td><?php echo $dados['descricao_processo']; ?></td>
                        <td><?php echo $dados['tempo_execucao']; ?></td>
                        <td><?php echo $dados['quantidade']; ?></td>
                        <td><?php echo $dados['id_equipamento_processo']; ?></td>
                        <td><?php echo $dados['id_funcionario_processo']; ?></td>
                        <td><?php echo $dados['id_produto_processo']; ?></td>
                        <td>
							<?php 
								echo "<a href='excfab.php?id_processo=".$dados['id_processo']."'><button class='btn btn-danger' type='button' name='excluir'>Excluir</button></a>";
							?>

                            <a href="#myModalAlterar" 
                                onclick="obterDadosModal('<?php echo $strdados ?>')">
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