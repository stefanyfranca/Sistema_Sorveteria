<?php
$conectar = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('frangelato');

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pesquisa insumo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F4DBB3;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #D2B48C;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #333;
            color: #F4DBB3;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 10px 0;
        }

        .btn:hover {
            background-color: #A0522D;
        }

        .modal-header,
        .modal-footer {
            background-color: #333;
            color: #F4DBB3;
        }

        .modal-header h1,
        .modal-footer button {
            color: #F4DBB3;
        }

        .form-group input[type="text"] {
            margin-bottom: 10px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid #333;
            width: 100%;
            padding: 5px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            background-color: #FFF;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #524136;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #F4DBB3;
        }

        .table-btn {
            display: flex;
            justify-content: center;
        }

        .table-btn button {
            margin: 5px;
        }
    </style>
    <script>
        function obterDadosModal(valor) {
            var retorno = valor.split("*");
            document.getElementById('id_produto').value = retorno[0];
            document.getElementById('nome').value = retorno[1];
            document.getElementById('descricao').value = retorno[2];
            document.getElementById('custo_venda').value = retorno[3];
            document.getElementById('quantidade_receita').value = retorno[4];
            document.getElementById('id_receita_produto').value = retorno[5];
        }
    </script>
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
                    <form class="form-group well" action="adicionar_insumo.php" method="POST">
                        <input type="text" id="id_produto" name="id_produto" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="descricao" name="descricao" required placeholder="Descrição">
                        <input type="text" id="custo_venda" name="custo_venda" required placeholder="Custo unitário">
                        <input type="text" id="quantidade_receita" name="quantidade_receita" required placeholder="Data de validade">
                        <input type="text" id="id_receita_produto" name="id_receita_produto" required placeholder="id_receita_produto">
                        <input type="text" id="custo_total_produto" name="custo_total_produto" required placeholder="custo_total_produto">
                        <button type="submit" class="btn" name="cadastrar">Cadastrar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Alterar-->
    <div class="modal fade" id="myModalAlterar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Alterar Registro...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="alterar_insumo.php" method="POST">
                        <input type="text" id="id_produto" name="id_produto" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="descricao" name="descricao" required placeholder="Descrição">
                        <input type="text" id="custo_venda" name="custo_venda" required placeholder="Custo unitário">
                        <input type="text" id="quantidade_receita" name="quantidade_receita" required placeholder="Data de validade">
                        <input type="text" id="id_receita_produto" name="id_receita_produto" required placeholder="id_receita_produto">
                        <input type="text" id="custo_total_produto" name="custo_total_produto" required placeholder="custo_total_produto">
                        <button type="submit" class="btn" name="alterar">Alterar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Excluir-->
    <div class="modal fade" id="myModalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Excluir Registro...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="excluir_insumo.php" method="GET">
                        <input type="text" id="id_produto" name="id_produto" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="descricao" name="descricao" required placeholder="Descrição">
                        <input type="text" id="custo_venda" name="custo_venda" required placeholder="Custo unitário">
                        <input type="text" id="quantidade_receita" name="quantidade_receita" required placeholder="Data de validade">
                        <input type="text" id="id_receita_produto" name="id_receita_produto" required placeholder="id_receita_produto">
                        <input type="text" id="custo_total_produto" name="custo_total_produto" required placeholder="custo_total_produto">
                        <button type="submit" class="btn" name="excluir">Excluir</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Funcionário</h2><br>
        <form action="tabela_insumo.php" method="POST">
            <input type="text" name="nome" id="nome" placeholder="Nome ..." class="form-control" style="display: inline-block; width: auto;">
            <button type="submit" name="pesquisar" class="btn">Pesquisar</button>
            <button type="button" class="btn" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button>
        </form>
        <table class="table table-striped">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Custo de venda</th>
                <th>Quantidade da receita</th>
                <th>Receita</th>
                <th>Custo total</th>
                <th>Operação</th>
            </tr>
            <?php
            if ((isset($_POST['pesquisar'])) or isset($_POST['cadastrar'])) {
                $consulta = "SELECT * FROM insumo";

                if ($_POST['nome'] != '') {
                    $consulta .= " WHERE nome LIKE '%" . $_POST['nome'] . "%'";
                }

                $resultado = mysql_query($consulta);

                while ($dados = mysql_fetch_array($resultado)) {
                    $strdados = $dados['id_produto'] . "*" . $dados['nome'] . "*" . $dados['descricao'] . "*" . $dados['custo_venda'] . "*" . $dados['estado'] . "*" . $dados['quantidade_receita'] . "*" . $dados['id_receita_produto']."*". $dados['custo_total_produto'];
                    ?>
                    <tr>
                        <td><?php echo $dados['id_produto']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['descricao']; ?></td>
                        <td><?php echo $dados['custo_venda']; ?></td>
                        <td><?php echo $dados['estado']; ?></td>
                        <td><?php echo $dados['quantidade_receita']; ?></td>
                        <td><?php echo $dados['id_receita_produto']; ?></td>
                        <td><?php echo $dados['custo_total_produto']; ?></td>
                        <td class="table-btn">
                            <a href="excluir_insumo.php?id_produto=<?php echo $dados['id_produto']; ?>" class="btn btn-danger">Excluir</a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalAlterar" onclick="obterDadosModal('<?php echo $strdados ?>')">Alterar</button>
                        </td>
                    </tr>
                    <?php
                }
                mysql_close($conectar);
            }
            ?>
        </table>
    </div>

    <!-- Bibliotecas requeridas -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
