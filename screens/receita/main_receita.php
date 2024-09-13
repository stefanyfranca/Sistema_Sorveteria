<?php
$conectar = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('frangelato');

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pesquisa receita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/db6ecd3c1f.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #FFFFFF;
            font-family: Arial, sans-serif;
            height:100%;
            width:100%;
        }

        .container {
            background-color: #F3F3F3;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width:80%;
            margin-left:240px;
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
        .lateral {
            background-color:#FFFFFF;
            height:100%;
            width:220px;
            position:absolute;
            box-shadow: 10px 0px 5px rgba(0, 0, 0, 0.1);
        }
        .botaoArea1{
            margin-top:15%;
            height:40px;
            width:220px;
        }
        .botaoArea2{
            margin-top:15%;
            height:40px;
            width:220px;
        }

        .botaoArea1:hover .opcoes{
            visibility: visible;
            opacity:100%;
        }

        .botaoArea1:hover .opcoes2{
            visibility: visible;
            opacity:100%;
        }

        .opcoes{
            height:40px;
            width: 260px;
            background-color:#E2E2E2E2;
            position:absolute;
            margin-left:220px;
            margin-top:-40px;
            visibility:hidden;
            transition: opacity 0.2s;
            font-size:15px;
            padding: 10px;
            opacity:0%;
        }
        .opcoes2{
            height:40px;
            width: 350px;
            background-color:#E2E2E2E2;
            position:absolute;
            margin-left:220px;
            margin-top:-40px;
            visibility:hidden;
            transition: opacity 0.2s;
            font-size:15px;
            padding: 10px;
            opacity:0%;
        }
        .botaoA{
            height:39px;
            width:185px;
            background-color:#6B0000; 
            margin-left:7.5%;
            border-radius:15.5px;
            position: relative;
        }
        .paraBotaoA{
            position:absolute;
            top:50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color:#FFFFFF;
            font-size:20px;
        }
        
        .botaoB{
            height:39px;
            width:185px;
            background-color:#FFFFFF; 
            margin-left:7.5%;
            border-radius:15.5px;
            position: relative;
        }
        .paraBotaoB{
            position:absolute;
            top:50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color:#6B0000;
            font-size:20px;
        }

        .a1{
            padding-left:15px;
            color:black;
        }
        .a1:hover{
            text-decoration:none;
            color:gray;
        }
        #iconeA{
            color:white;
            font-size:25px;
            margin-left:7%;
            margin-top:4.5%;
        }
        #setaA{
            color:white;
            font-size:17px;
            margin-left:70%;
            
        }

        #iconeB{
            color:#6B0000;
            font-size:25px;
            margin-left:7%;
            margin-top:4.5%;
        }
        #setaB{
            color:#6B0000;
            font-size:17px;
            margin-left:70%;
            
        }

        .txtfrangelato{
            color:#6B0000;
            font-size:20px;
            margin-left:20%;
            margin-top:10%;
        }
        .logout{
            color:#6B0000;
            font-size:20px;
            margin-left:35%;
            margin-top:15%;
        }
        .fa-arrow-right-from-bracket{
            color:#6B0000;
            font-size:25px;
            position:absolute;
            margin-top:1%;
            margin-left:18%;
        }
    </style>
    <script>

    </script>
</head>

<body>
<div class="lateral">
<p class="txtfrangelato">FRANGELATO</p> 

<div class="botaoArea2">
    <div class=botaoB>
            <i class="fa-solid fa-wine-glass-empty" id="iconeB"></i>
            <p class="paraBotaoB">Dashboard</p>
            <i class="fa-solid fa-angle-right" id="setaB"></i>
    </div>
</div>

<div class="botaoArea2">
    <div class=botaoB>
            <i class="fa-solid fa-wine-glass-empty" id="iconeB"></i>
            <p class="paraBotaoB">Funcionarios</p>
            <i class="fa-solid fa-angle-right" id="setaB"></i>
    </div>
</div>

<div class="botaoArea2">
    <div class=botaoB>
            <i class="fa-solid fa-wine-glass-empty" id="iconeB"></i>
            <p class="paraBotaoB">Fornecedores</p>
            <i class="fa-solid fa-angle-right" id="setaB"></i>
    </div>
</div>

<div class="botaoArea1">
    <div class=botaoB>
            <i class="fa-solid fa-wine-glass-empty" id="iconeB"></i>
            <p class="paraBotaoB">Fabricacao</p>
            <i class="fa-solid fa-angle-right" id="setaB"></i>
    </div>
    <div class="opcoes2">
        
           <a href="main_receita.php" class="a1">Equipamento</a>
           <a href="main_receita.php" class="a1">Lote-producao</a>
           <a href="main_receita.php" class="a1">Fabricacao</a>
        
    </div>
</div>

<div class="botaoArea2">
    <div class=botaoB>
            <i class="fa-solid fa-wine-glass-empty" id="iconeB"></i>
            <p class="paraBotaoB">Insumos</p>
            <i class="fa-solid fa-angle-right" id="setaB"></i>
    </div>
</div>

<div class="botaoArea1">
    <div class=botaoA>
            <i class="fa-solid fa-wine-glass-empty" id="iconeA"></i>
            <p class="paraBotaoA">Produtos</p>
            <i class="fa-solid fa-angle-right" id="setaA"></i>
    </div>
    <div class="opcoes">
        
           <a href="main_receita.php" class="a1">Receita</a>
           <a href="main_receita.php" class="a1">Produto</a>
           <a href="main_receita.php" class="a1">ingrediente</a>
        
    </div>
</div>

<div class="botaoArea2">
    <div class=botaoB>
            <i class="fa-solid fa-wine-glass-empty" id="iconeB"></i>
            <p class="paraBotaoB">Usuarios</p>
            <i class="fa-solid fa-angle-right" id="setaB"></i>
    </div>
</div>

<a href="/SISTEMA_SORVETERIA/login.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><p class="logout">Log Out</p></a>


</div>
    <!--Modal Cadastrar-->
    <div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar um registro ...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="adicionar_receita.php" method="POST">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="descricao" name="descricao" required placeholder="Descrição">
                        <input type="text" id="tempo_preparo" name="tempo_preparo" required placeholder="tempo_preparo">
                        <input type="text" id="quantidade_produzida" name="quantidade_produzida" required placeholder="quantidade_produzida">
                        <input type="text" id="custo_total" name="custo_total" required placeholder="custo_total">
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
                    <form class="form-group well" action="alterar_receita.php" method="POST">
                        <input type="text" id="id_receita" name="id_receita" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="descricao" name="descricao" required placeholder="Descrição">
                        <input type="text" id="tempo_preparo" name="tempo_preparo" required placeholder="Custo unitário">
                        <input type="text" id="quantidade_produzida" name="quantidade_produzida" required placeholder="Data de validade">
                        <input type="text" id="custo_total" name="custo_total" required placeholder="custo_total">
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
                    <form class="form-group well" action="excluir_receita.php" method="GET">
                        <input type="text" id="id_receita" name="id_receita" required placeholder="Código">
                        <input type="text" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" id="descricao" name="descricao" required placeholder="Descrição">
                        <input type="text" id="tempo_preparo" name="tempo_preparo" required placeholder="Custo unitário">
                        <input type="text" id="quantidade_produzida" name="quantidade_produzida" required placeholder="Data de validade">
                        <input type="text" id="custo_total" name="custo_total" required placeholder="custo_total">
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
        <h2>Receita</h2><br>
        <form action="main_receita.php" method="POST">
            <input type="text" name="nome" id="nome" placeholder="Nome ..." class="form-control" style="display: inline-block; width: auto;">
            <button type="submit" name="pesquisar" class="btn">Pesquisar</button>
            <button type="button" class="btn" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button>
        </form>
        <table class="table table-striped">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Tempo de preparo</th>
                <th>Quantidade</th>
                <th>Custo total</th>
                <th>Operação</th>
            </tr>
            <?php
            if ((isset($_POST['pesquisar'])) or isset($_POST['cadastrar'])) {
                $consulta = "SELECT * FROM receita";

                if ($_POST['nome'] != '') {
                    $consulta .= " WHERE nome LIKE '%" . $_POST['nome'] . "%'";
                }

                $resultado = mysql_query($consulta);

                while ($dados = mysql_fetch_array($resultado)) {
                    $strdados = $dados['id_receita'] . "*" . $dados['nome'] . "*" . $dados['descricao'] . "*" . $dados['tempo_preparo'] . "*" . $dados['quantidade_produzida'] . "*" . $dados['custo_total'];
                    ?>
                    <tr>
                        <td><?php echo $dados['id_receita']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['descricao']; ?></td>
                        <td><?php echo $dados['tempo_preparo']; ?></td>
                        <td><?php echo $dados['quantidade_produzida']; ?></td>
                        <td><?php echo $dados['custo_total']; ?></td>
                        <td class="table-btn">
                            <a href="excluir_receita.php?id_receita=<?php echo $dados['id_receita']; ?>" class="btn btn-danger">Excluir</a>
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
