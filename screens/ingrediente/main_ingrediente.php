<?php
$conectar = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('frangelato');

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pesquisa ingrediente</title>
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
            document.getElementById('id_ingrediente').value = retorno[0];
            document.getElementById('nome').value = retorno[1];
            document.getElementById('id_receita_receita').value = retorno[2];
            document.getElementById('id_insumo_receita').value = retorno[3];
            document.getElementById('quantidade_necessaria').value = retorno[4];
            document.getElementById('custo_fabricacao').value = retorno[5];
            document.getElementById('unidade_medida').value = retorno[6];
            document.getElementById('observacoes').value = retorno[7];
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
                    <form class="form-group well" action="adicionar_ingrediente.php" method="POST">
                        <input type="text" id="id_ingrediente" name="id_ingrediente" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="id_receita_receita" name="id_receita_receita" required placeholder="Ex.: g ou Kg">
                        <input type="text" id="id_insumo_receita" name="id_insumo_receita" required placeholder="Custo unitário">
                        <input type="text" id="quantidade_necessaria" name="quantidade_necessaria" required placeholder="Data de validade">
                        <input type="text" id="custo_fabricacao" name="custo_fabricacao" required placeholder="custo_fabricacao">
                        <input type="text" id="unidade_medida" name="unidade_medida" required placeholder="unidade_medida">
                        <input type="text" id="observacoes" name="observacoes" required placeholder="observacoes">
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
                    <form class="form-group well" action="alterar_ingrediente.php" method="POST">
                        <input type="text" id="id_ingrediente" name="id_ingrediente" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="id_receita_receita" name="id_receita_receita" required placeholder="Ex.: g ou Kg">
                        <input type="text" id="id_insumo_receita" name="id_insumo_receita" required placeholder="Custo unitário">
                        <input type="text" id="quantidade_necessaria" name="quantidade_necessaria" required placeholder="Data de validade">
                        <input type="text" id="custo_fabricacao" name="custo_fabricacao" required placeholder="custo_fabricacao">
                        <input type="text" id="unidade_medida" name="unidade_medida" required placeholder="unidade_medida">
                        <input type="text" id="observacoes" name="observacoes" required placeholder="observacoes">
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
                    <form class="form-group well" action="excluir_ingrediente.php" method="GET">
                        <input type="text" id="id_ingrediente" name="id_ingrediente" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="id_receita_receita" name="id_receita_receita" required placeholder="Ex.: g ou Kg">
                        <input type="text" id="id_insumo_receita" name="id_insumo_receita" required placeholder="Custo unitário">
                        <input type="text" id="quantidade_necessaria" name="quantidade_necessaria" required placeholder="Data de validade">
                        <input type="text" id="custo_fabricacao" name="custo_fabricacao" required placeholder="custo_fabricacao">
                        <input type="text" id="unidade_medida" name="unidade_medida" required placeholder="unidade_medida">
                        <input type="text" id="observacoes" name="observacoes" required placeholder="observacoes">
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
        <h2>Ingrediente</h2><br>
        <form action="main_ingrediente.php" method="POST">
            <input type="text" name="nome" id="nome" placeholder="Nome ..." class="form-control" style="display: inline-block; width: auto;">
            <button type="submit" name="pesquisar" class="btn">Pesquisar</button>
            <button type="button" class="btn" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button>
        </form>
        <table class="table table-striped">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Receita</th>
                <th>Insumo</th>
                <th>Quantidade</th>
                <th>Custo de fabricação</th>
                <th>Unidade de medida</th>
                <th>Observações</th>
                <th>Operação</th>
            </tr>
            <?php
            if ((isset($_POST['pesquisar'])) or isset($_POST['cadastrar'])) {
                $consulta = "SELECT * FROM ingrediente_receita";

                if ($_POST['nome'] != '') {
                    $consulta .= " WHERE nome LIKE '%" . $_POST['nome'] . "%'";
                }

                $resultado = mysql_query($consulta);

                while ($dados = mysql_fetch_array($resultado)) {
                    $strdados = $dados['id_ingrediente'] . "*" . $dados['nome'] . "*" . $dados['id_receita_receita'] . "*" . $dados['id_insumo_receita'] . "*" . $dados['quantidade_necessaria'] . "*" . $dados['custo_fabricacao'] . "*" . $dados['unidade_medida'] . "*" . $dados['observacoes'];
                    ?>
                    <tr>
                        <td><?php echo $dados['id_ingrediente']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['id_receita_receita']; ?></td>
                        <td><?php echo $dados['id_insumo_receita']; ?></td>
                        <td><?php echo $dados['quantidade_necessaria']; ?></td>
                        <td><?php echo $dados['custo_fabricacao']; ?></td>
                        <td><?php echo $dados['unidade_medida']; ?></td>
                        <td><?php echo $dados['observacoes']; ?></td>
                        <td class="table-btn">
                            <a href="excluir_ingrediente.php?id_ingrediente=<?php echo $dados['id_ingrediente']; ?>" class="btn btn-danger">Excluir</a>
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
