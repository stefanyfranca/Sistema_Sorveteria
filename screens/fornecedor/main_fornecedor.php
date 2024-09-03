<?php
$conectar = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('frangelato');

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pesquisa fornecedor</title>
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
            document.getElementById('id_fornecedor').value = retorno[0];
            document.getElementById('nome').value = retorno[1];
            document.getElementById('cnpj').value = retorno[2];
            document.getElementById('endereco').value = retorno[3];
            document.getElementById('cidade').value = retorno[4];
            document.getElementById('estado').value = retorno[5];
            document.getElementById('pais').value = retorno[6];
            document.getElementById('telefone').value = retorno[7];
            document.getElementById('email').value = retorno[8];
            document.getElementById('observacoes').value = retorno[9];
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
                    <form class="form-group well" action="adicionar_fornecedor.php" method="POST">
                        <input type="text" id="id_fornecedor" name="id_fornecedor" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="cnpj" name="cnpj" required placeholder="Ex.: g ou Kg">
                        <input type="text" id="endereco" name="endereco" required placeholder="Custo unitário">
                        <input type="text" id="cidade" name="cidade" required placeholder="Data de validade">
                        <input type="text" id="estado" name="estado" required placeholder="estado">
                        <input type="text" id="pais" name="pais" required placeholder="pais">
                        <input type="text" id="telefone" name="telefone" required placeholder="telefone">
                        <input type="text" id="email" name="email" required placeholder="email">
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
                    <form class="form-group well" action="alterar_fornecedor.php" method="POST">
                        <input type="text" id="id_fornecedor" name="id_fornecedor" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="cnpj" name="cnpj" required placeholder="Ex.: g ou Kg">
                        <input type="text" id="endereco" name="endereco" required placeholder="Custo unitário">
                        <input type="text" id="cidade" name="cidade" required placeholder="Data de validade">
                        <input type="text" id="estado" name="estado" required placeholder="estado">
                        <input type="text" id="pais" name="pais" required placeholder="pais">
                        <input type="text" id="telefone" name="telefone" required placeholder="telefone">
                        <input type="text" id="email" name="email" required placeholder="email">
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
                    <form class="form-group well" action="excluir_fornecedor.php" method="GET">
                        <input type="text" id="id_fornecedor" name="id_fornecedor" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="cnpj" name="cnpj" required placeholder="Ex.: g ou Kg">
                        <input type="text" id="endereco" name="endereco" required placeholder="Custo unitário">
                        <input type="text" id="cidade" name="cidade" required placeholder="Data de validade">
                        <input type="text" id="estado" name="estado" required placeholder="estado">
                        <input type="text" id="pais" name="pais" required placeholder="pais">
                        <input type="text" id="telefone" name="telefone" required placeholder="telefone">
                        <input type="text" id="email" name="email" required placeholder="email">
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
        <h2>fornecedor</h2><br>
        <form action="main_fornecedor.php" method="POST">
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
                $consulta = "SELECT * FROM fornecedor";

                if ($_POST['nome'] != '') {
                    $consulta .= " WHERE nome LIKE '%" . $_POST['nome'] . "%'";
                }

                $resultado = mysql_query($consulta);

                while ($dados = mysql_fetch_array($resultado)) {
                    $strdados = $dados['id_fornecedor'] . "*" . $dados['nome'] . "*" . $dados['cnpj'] . "*" . $dados['endereco'] . "*" . $dados['cidade'] . "*" . $dados['estado'] . "*" . $dados['pais'] . "*" . $dados['telefone']. "*" . $dados['email']. "*" . $dados['observacoes'];
                    ?>
                    <tr>
                        <td><?php echo $dados['id_fornecedor']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['cnpj']; ?></td>
                        <td><?php echo $dados['endereco']; ?></td>
                        <td><?php echo $dados['cidade']; ?></td>
                        <td><?php echo $dados['estado']; ?></td>
                        <td><?php echo $dados['pais']; ?></td>
                        <td><?php echo $dados['telefone']; ?></td>
                        <td><?php echo $dados['email']; ?></td>
                        <td><?php echo $dados['observacoes']; ?></td>
                        <td class="table-btn">
                            <a href="excluir_fornecedor.php?id_fornecedor=<?php echo $dados['id_fornecedor']; ?>" class="btn btn-danger">Excluir</a>
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
