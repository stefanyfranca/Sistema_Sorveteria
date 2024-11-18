<?php
$conectar = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('frangelato');

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Estoque produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/db6ecd3c1f.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #FFFFFF;
            font-family: Arial, sans-serif;
            height:100%;
            width:100%;
        }

        .container {
            padding: 20px;
            width:80%;
            margin-left:240px;
        }

        h2 {
            color: #6B0000;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #6B0000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 10px 0;
            height:30px;
        }

        .btn:hover {
            background-color: #450101;
            color: #fff;
        }

        .btnFuncoes {
            background-color: #6B0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            height:33px;
            margin-left:5px;
        }

        .divFuncoes{
            width:190px;
            margin-left:850px;
            margin-top:-33px;
            position: absolute;
        }

        .btnFuncoes:hover {
            background-color: #450101;
            color: #fff;
        }

        .btnPesquisar {
            background-color: #6B0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            height:33px;
            margin-left:5px;
        }

        .btnPesquisar:hover {
            background-color: #450101;
            color: #fff;
        }


        .modal-header,
        .modal-footer {
            background-color: #450101;
            color: #450101;
        }

        .modal-header h1,
        .modal-footer button {
            color: #fff;
        }

        .textoForm{   
            margin-bottom: 10px;
            height: 28px;
            border-radius: 5px;
            border: 1px solid #333;
            width: 100%;
            padding: 5px;
        }

        table {
            width: 100%;
            background-color: #FFF;
            border-collapse: collapse;
            border: 0px solid;
        }


        td {
            border: 1px solid #B7B7B7;
            height: 20px;
            text-align: left;
            vertical-align: center;
            border: 0px solid;

        }


        th {
            height:20px;
            color:#6B0000;
        }

        tr:nth-child(even){
            background-color: #f2f2f2;
        }



        .table-btn button {
            margin: 5px;
        }

        .lateral {
            background-color:#FFFFFF;
            height:100%;
            width:220px;
            position:fixed;
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
            width: 180px;
            background-color:#F7F7F7;
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
            width: 240px;
            background-color:#F7F7F7;
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
            width:200px;
            background-color:#6B0000; 
            margin-left:5%;
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
            align-items: left;
        }
        
        .botaoB{
            height:39px;
            width:195px;
            background-color:#FFFFFF; 
            margin-left:5%;
            border-radius:15.5px;
            position: relative;
        }

        .botaoB:hover{
            background-color:#FAF3F3; 
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
            color:#6B0000;
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
            margin-left:70%;
            margin-top: 4px;
            position: absolute;
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
            margin-top:90%;
            text-decoration: none;
        }
        .fa-arrow-right-from-bracket{
            color:#6B0000;
            font-size:25px;
            position:absolute;
            margin-top:15%;
            margin-left:18%;
        }
        .icone{
            margin-top: 5px;
            margin-left: 3px;
        }

        .selectInsumo{
            margin-bottom: 10px;
            height: 28px;
            width: 265px;
            border-radius: 5px;
            border: 1px solid #333;
        }

        .textInsumo{
            margin-bottom: 10px;
            height: 28px;
            width: 265px;
            border-radius: 5px;
            border: 1px solid #333;
        }
        
        .btnInsumo{
            background-color:#6B0000;
            border: none;
            color:white;
            border-radius:4px;
        }

        .divinsumos{
            width: 600px;
        }
        
        .btnAdicionar{
            background-color:#6B0000;
            margin-bottom:10px;
            border:none;
            border-radius:4px;
            color:white;
        }

        .alerta{
            height:120px;
            width:300px;
            background-color:#FFFFFF;
            color:#6B0000;
            border-radius:5px;
            border-width:2px;
            margin-left:38%;
            position: fixed;
            z-index: 100;
            margin-top:20%;
            box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.1);
        }

        .btnalerta{
            width:40px;
            height:25px;
            background-color:#6B0000;
            color:white;
            margin-top:15px;
            margin-left:130px;
            border-style:none;
            border-radius:4px;
        }
        
        .textoAlerta{
            margin-left:55px;
            margin-top:45px;
            height:10px;
            
        }

        .iconeTabela{
            margin-top:-7px;
        }

        .divFuncoesBotoes {
    margin-top: 20px;
    display: flex;
    gap: 0; 
}

.botaoTelasativa {
    background-color: #6B0000;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    height: 33px;
    margin-right: 0; 
}
.botaoTelasinativa {
    background-color: #fff;
    color: #6B0000;
    border: 0.5px;
    cursor: pointer;
    transition: background-color 0.3s;
    height: 33px;
    margin-right: 0; 
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
            function modalidAdicionar(id){
                $('#myModalAlterar').modal('show');
                
                let local = document.querySelector('#formAdicionar');
                    let escondido = `<input type="hidden" name="id_produto" id="escondido" value="`+id+`" />`; 
                    local.insertAdjacentHTML('afterbegin', escondido);
            }
            
            $(document).ready(function(){
                $('#myModalAlterar').on('hidden.bs.modal', function () {

                let escondido = document.getElementById("escondido");
                escondido.remove();
                
                });
                $('#myModalExcluir').on('hidden.bs.modal', function () {

                let escondido = document.getElementById("escondido");
                escondido.remove();
                let btnRetirar = document.getElementById("btnRetirar");
                btnRetirar.remove();

                }); 
            });

            function modalidRetirar(id, quantidade){
                $('#myModalExcluir').modal('show');
                
                let local = document.querySelector('#formRetirar');
                    let escondido = `<input type="hidden" name="id_produto" id="escondido" value="`+id+`" />`; 
                    local.insertAdjacentHTML('afterbegin', escondido);
                
                    local = document.querySelector('#formRetirar');
                    let submit = `<button type="button" id="btnRetirar" class="btn" name="retirar" onclick="submitCondicionado(`+quantidade+`)">retirar</button>`; 
                    local.insertAdjacentHTML('afterend', submit);
                    
            }

            function submitCondicionado(quantidade){
                
                let quantidadeRetirar = document.getElementById('quantidade_retirar').value;

                if (quantidadeRetirar <= quantidade){
                document.getElementById("formRetirar").submit();
                }
                else{
                    if(document.querySelector("#alerta") == null){
                    let local = document.querySelector('#myModalExcluir');
                    let aviso = `<div class="alerta" id="alerta"><p class="textoAlerta">Quantidade supera o estoque!</p><button class="btnalerta" onclick="deletarAlerta()">OK</button></div>`; 
                    local.insertAdjacentHTML('afterbegin', aviso);
                }
                }
            }

            function deletarAlerta(){
            let alerta = document.getElementById("alerta");
            alerta.remove();
            }
            
    </script>

</head>

<body>
<div class="lateral">
<p class="txtfrangelato">FRANGELATO</p> 

<a href="/SISTEMA_SORVETERIA/funcionarios/fornecedor/main_fornecedor.php">
<div class="botaoArea2">
    <div class=botaoB>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" class= "icone"fill="#6B0000"><path d="M640-640h120-120Zm-440 0h338-18 14-334Zm16-80h528l-34-40H250l-34 40Zm184 270 80-40 80 40v-190H400v190Zm182 330H200q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v196q-19-7-39-11t-41-4v-122H640v153q-35 20-61 49.5T538-371l-58-29-160 80v-320H200v440h334q8 23 20 43t28 37Zm138 0v-120H600v-80h120v-120h80v120h120v80H800v120h-80Z"/></svg>
            <p class="paraBotaoB">Fornecedores</p>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#6B0000" id="setaB"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
    </div>
</div>
</a>


<div class="botaoArea1">
    <div class=botaoB>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" class= "icone"fill="#6B0000"><path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>
            <p class="paraBotaoB">Fabricação</p>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#6B0000" id="setaB"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
    </div>
    <div class="opcoes2">
        
           <a href="/SISTEMA_SORVETERIA/funcionarios/equipamento/main_equipamento.php" class="a1">Equipamento</a>
           <a href="/SISTEMA_SORVETERIA/funcionarios/processo_fabricacao/main_fabricacao.php" class="a1">Fabricação</a>
        
    </div>
</div>

<a href="/SISTEMA_SORVETERIA/funcionarios/insumo/main_insumo.php">
<div class="botaoArea1">
    <div class=botaoB>
    <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" class= "icone"fill="#6B0000"><path d="M221-120q-27 0-48-16.5T144-179L42-549q-5-19 6.5-35T80-600h190l176-262q5-8 14-13t19-5q10 0 19 5t14 13l176 262h192q20 0 31.5 16t6.5 35L816-179q-8 26-29 42.5T739-120H221Zm-1-80h520l88-320H132l88 320Zm260-80q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM367-600h225L479-768 367-600Zm113 240Z"/></svg>
            <p class="paraBotaoB">Insumos</p>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#6B0000" id="setaB"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
    </div>
</div>
</a>

<div class="botaoArea2">
    <div class=botaoA>
    <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" class= "icone"fill="#fff"><path d="M482-40 294-400q-71 3-122.5-41T120-560q0-51 29.5-92t74.5-58q18-91 89.5-150.5T480-920q95 0 166.5 59.5T736-710q45 17 74.5 58t29.5 92q0 75-53 119t-119 41L482-40ZM280-480q15 0 29.5-5t26.5-17l22-22 26 16q21 14 45.5 21t50.5 7q26 0 50.5-7t45.5-21l26-16 22 22q12 12 26.5 17t29.5 5q33 0 56.5-23.5T760-560q0-30-19-52.5T692-640l-30-4-2-32q-5-69-57-116.5T480-840q-71 0-123 47.5T300-676l-2 32-30 6q-30 6-49 27t-19 51q0 33 23.5 56.5T280-480Zm202 266 108-210q-24 12-52 18t-58 6q-27 0-54.5-6T372-424l110 210Zm-2-446Z"/></svg>
            <p class="paraBotaoA">Produtos</p>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#fff" id="setaB"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
    </div>
    <div class="opcoes">
        
           <a href="/SISTEMA_SORVETERIA/funcionarios/receita/main_receita.php" class="a1">Receita</a>
           <a href="/SISTEMA_SORVETERIA/funcionarios/produto/main_produto.php" class="a1">Produto</a>
        
    </div>
</div>

<a href="/SISTEMA_SORVETERIA/login.php"><p class="logout">Log Out</p></a>


</div>
    <!--Modal Alterar-->
    <div class="modal fade" id="myModalAlterar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar...</h1>
                </div>
                <div class="modal-body">
                    <form id="formAdicionar" class="form-group well" action="adicionar_estoque_produto.php" method="POST">
                        <input type="text" class="textoForm" id="quantidade_adicionar" name="quantidade_adicionar" required placeholder="...g,ml">

                        <button type="submit" class="btn" name="adicionar">adicionar</button>
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
                    <h1>Retirar...</h1>
                </div>
                <div class="modal-body">
                    <form id="formRetirar" class="form-group well" action="retirar_estoque_produto.php" method="POST">
                    <input type="text" class="textoForm" id="quantidade_retirar" name="quantidade_retirar" required placeholder="...g,ml">

                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>ESTOQUE PRODUTOS</h2><br>
        <form action="estoque_produto.php" method="POST">
    <input type="text" name="nome" id="nome" placeholder="Nome ..." class="form-control" style="display: inline-block; width: auto;">
    
    <button type="submit" name="pesquisar" class="btnPesquisar">Pesquisar</button>
    
    <div class="divFuncoes">

    <!-- Botão "Exportar" com ícone de exportação -->
    <button type="button" class="btnFuncoes" data-toggle="modal" data-target="#myModalExportar">
        <i class="fas fa-file-export"></i> Exportar
    </button>
    </div>

    <div class="divFuncoesBotoes">
            <!-- Botão "Cadastrar" -->
            <button type="button" class="botaoTelasinativa" onclick="window.location.href='/SISTEMA_SORVETERIA/funcionarios/produto/main_produto.php'">
                Produtos
            </button>

            <!-- Botão "Exportar" -->
            <button type="button" class="botaoTelasativa" onclick="window.location.href='/SISTEMA_SORVETERIA/funcionarios/produto/estoque_produto.php'">
                Estoque
            </button>

        </div>

</form>
    <div style="overflow-x:auto;">
        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Operação</th>
            </tr>
            <?php
            if ((isset($_POST['pesquisar'])) or isset($_POST['cadastrar'])) {
                $consulta = "SELECT  id_produto,nome, quantidade_estoque FROM produto";

                if ($_POST['nome'] != '') {
                    $consulta .= " WHERE nome LIKE '%" . $_POST['nome'] . "%'";
                }

                $resultado = mysql_query($consulta);

                while ($dados = mysql_fetch_array($resultado)) {
                    $idProduto = $dados['id_produto'];
                    $quantidadeProduto = $dados['quantidade_estoque'];
                    ?>

                    <tr>
                        <td ><?php echo $dados['nome']; ?></td>
                        <td ><?php echo $dados['quantidade_estoque']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="modalidRetirar('<?php echo $idProduto; ?>','<?php echo $quantidadeProduto; ?>')"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#f2f2f2" class="iconeTabela"><path d="M200-440v-80h560v80H200Z"/></svg></button>
                            <button type="button" class="btn btn-primary" onclick="modalidAdicionar('<?php echo $idProduto; ?>')"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#f2f2f2" class= "iconeTabela"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg></button>
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

</body>

</html>
