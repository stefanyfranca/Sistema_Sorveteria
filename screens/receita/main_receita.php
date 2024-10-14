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
        }

        .btn:hover {
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
            margin-top: 20px;
            background-color: #FFF;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #B7B7B7;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #fff;
            color: #B7B7B7;
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
            width: 350px;
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
            margin-top:15%;
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
            background-color:green;
            margin-bottom:10px;
            border:none;
            border-radius:4px;
            color:white;
        }

        .alerta{
            height:500px;
            width:500px;
            background-color:red;
            color:white;
            border-radius:5px;

        }
    </style>
    <script>
        var contador = 0;

        function excinsumo(a){
            let numeromenos = 0;
            let numero = a;
            let para = 0;
            let elemento = document.getElementById("insumo"+a+"");
            elemento.remove();
            elemento = document.getElementById("quantidade_insumo"+a+"");
            elemento.remove();
            elemento = document.getElementById("botaoexc"+a+"");
            elemento.remove();
            contador -= 1;
            while(para != 1){
                numero += 1;
                if(document.querySelector("#insumo"+numero+"")){
                    numeromenos = numero - 1;
                    elemento = document.querySelector("#insumo"+numero+"")
                    elemento.setAttribute("name", "insumo"+numeromenos+"");
                    elemento.setAttribute("id", "insumo"+numeromenos+"");

                    elemento = document.querySelector("#quantidade_insumo"+numero+"")
                    elemento.setAttribute("name", "quantidade_insumo"+numeromenos+"");
                    elemento.setAttribute("id", "quantidade_insumo"+numeromenos+"");

                    elemento = document.querySelector("#botaoexc"+numero+"")
                    elemento.setAttribute("name", "botaoexc"+numeromenos+"");
                    elemento.setAttribute("id", "botaoexc"+numeromenos+"");
                    elemento.setAttribute("onclick", "excinsumo("+numeromenos+")");
                }
                else{
                    para = 1;
                }
            }
        }

        function addinsumo(){
            if(contador<30){
            contador += 1;
            let modal = document.querySelector('.divinsumos');
            let novoselect = `<select id="insumo`+contador+`" class="selectInsumo" name="insumo`+contador+`">
                        <option value="" selected="selected">Todos</option>

                        <?php
                        $query = mysql_query("SELECT id_insumo, nome FROM insumo");
                        while($insumo = mysql_fetch_array($query))
                        {
                        ?>
                        <option value="<?php echo $insumo["id_insumo"]?>">                                                     
                        <?php echo $insumo["nome"]  ?></option>
                        <?php }
                        ?>
                        </select>
                        <input type="text" class="textInsumo" id="quantidade_insumo`+contador+`" name="quantidade_insumo`+contador+`" required placeholder="...g">
                        <button class="btnInsumo" id= "botaoexc`+contador+`" onclick="excinsumo(`+contador+`)">X</button>`;
            
            modal.insertAdjacentHTML('beforeend', novoselect);
                        }
            else{
                let local = document.querySelector('#myModalCadastrar');
                let aviso = `<div class="alerta">Numero maximo de insumos atingido!</div>`; 
                local.insertAdjacentHTML('beforebegin', aviso);
            }
        }

    </script>
</head>

<body>
<div class="lateral">
<p class="txtfrangelato">FRANGELATO</p> 

<a href="/SISTEMA_SORVETERIA/screens/widgets/widgets.php">
<div class="botaoArea2">
    <div class=botaoB>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" class= "icone"fill="#6B0000"><path d="M666-440 440-666l226-226 226 226-226 226Zm-546-80v-320h320v320H120Zm400 400v-320h320v320H520Zm-400 0v-320h320v320H120Zm80-480h160v-160H200v160Zm467 48 113-113-113-113-113 113 113 113Zm-67 352h160v-160H600v160Zm-400 0h160v-160H200v160Zm160-400Zm194-65ZM360-360Zm240 0Z"/></svg>
            <p class="paraBotaoB">Dashboard</p>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#6B0000" id="setaB"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
    </div>
</div>
</a>

<a href="/SISTEMA_SORVETERIA/screens/funcionario/main_funcionario.php">
<div class="botaoArea2">
    <div class=botaoB>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" class= "icone"fill="#6B0000"><path d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/></svg>
            <p class="paraBotaoB">Funcionários</p>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#6B0000" id="setaB"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
    </div>
</div>
</a>

<a href="/SISTEMA_SORVETERIA/screens/fornecedor/main_fornecedor.php">
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
        
           <a href="/SISTEMA_SORVETERIA/screens/equipamento/main_equipamento.php" class="a1">Equipamento</a>
           <a href="/SISTEMA_SORVETERIA/screens/lote_producao/main_lote_producao.php" class="a1">Lote-produção</a>
           <a href="/SISTEMA_SORVETERIA/screens/processo_fabricacao/main_fabricacao.php" class="a1">Fabricação</a>
        
    </div>
</div>

<a href="/SISTEMA_SORVETERIA/screens/insumo/main_insumo.php">
<div class="botaoArea2">
    <div class=botaoB>
    <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" class= "icone"fill="#6B0000"><path d="M221-120q-27 0-48-16.5T144-179L42-549q-5-19 6.5-35T80-600h190l176-262q5-8 14-13t19-5q10 0 19 5t14 13l176 262h192q20 0 31.5 16t6.5 35L816-179q-8 26-29 42.5T739-120H221Zm-1-80h520l88-320H132l88 320Zm260-80q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM367-600h225L479-768 367-600Zm113 240Z"/></svg>
            <p class="paraBotaoB">Insumos</p>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#6B0000" id="setaB"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
    </div>
</div>
</a>

<div class="botaoArea1">
    <div class=botaoA>
    <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" class= "icone"fill="#fff"><path d="M482-40 294-400q-71 3-122.5-41T120-560q0-51 29.5-92t74.5-58q18-91 89.5-150.5T480-920q95 0 166.5 59.5T736-710q45 17 74.5 58t29.5 92q0 75-53 119t-119 41L482-40ZM280-480q15 0 29.5-5t26.5-17l22-22 26 16q21 14 45.5 21t50.5 7q26 0 50.5-7t45.5-21l26-16 22 22q12 12 26.5 17t29.5 5q33 0 56.5-23.5T760-560q0-30-19-52.5T692-640l-30-4-2-32q-5-69-57-116.5T480-840q-71 0-123 47.5T300-676l-2 32-30 6q-30 6-49 27t-19 51q0 33 23.5 56.5T280-480Zm202 266 108-210q-24 12-52 18t-58 6q-27 0-54.5-6T372-424l110 210Zm-2-446Z"/></svg>
            <p class="paraBotaoA">Produtos</p>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#fff" id="setaB"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
    </div>
    <div class="opcoes">
        
           <a href="/SISTEMA_SORVETERIA/screens/receita/main_receita.php" class="a1">Receita</a>
           <a href="/SISTEMA_SORVETERIA/screens/produto/main_produto.php" class="a1">Produto</a>
           <a href="/SISTEMA_SORVETERIA/screens/ingrediente/main_ingrediente.php" class="a1">Ingrediente</a>
        
    </div>
</div>

<a href="/SISTEMA_SORVETERIA/screens/usuario/main_usuario.php">
<div class="botaoArea2">
    <div class=botaoB>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" class= "icone"fill="#6B0000"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
            <p class="paraBotaoB">Usuários</p>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#6B0000" id="setaB"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
    </div>
</div>
</a>

<a href="/SISTEMA_SORVETERIA/login.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><p class="logout">Log Out</p></a>


</div>
    <!--Modal Cadastrar-->
    <div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar um registro ...</h1>
                </div>
                <div class="modal-body1">
                    <form class="form-group well" action="adicionar_receita.php" method="POST">
                        <input type="text" class="textoForm" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" class="textoForm" id="descricao" name="descricao" required placeholder="Descrição">
                        
                        <select name="insumo0" class="selectInsumo">
                        <option value="" selected="selected">Todos</option>

                        <?php
                        $query = mysql_query("SELECT id_insumo, nome FROM insumo");
                        while($insumo = mysql_fetch_array($query))
                        {
                        ?>
                        <option value="<?php echo $insumo['id_insumo']?>">                                                     
                        <?php echo $insumo['nome']  ?></option>
                        <?php }
                        ?>
                        </select>
                        <input type="text" class="textInsumo" id="quantidade_insumo0" name="quantidade_insumo0" required placeholder="...g">
                        <div class="divinsumos"></div>
                        <button class="btnAdicionar" onclick="addinsumo()">Insumo +</button>
                        <input type="text" class="textoForm" id="tempo_preparo" name="tempo_preparo" required placeholder="tempo_preparo">
                        <input type="text" class="textoForm" id="quantidade_produzida" name="quantidade_produzida" required placeholder="quantidade_produzida">
                        <button type="submit" class="btn" name="cadastrar">Cadastrar</button>
                        <button type="submit" class="btn" name="exportar">Exportar</button>
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
                        <input type="text" class="textoForm" id="id_receita" name="id_receita" required placeholder="Código">
                        <input type="text" class="textoForm" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" class="textoForm" id="descricao" name="descricao" required placeholder="Descrição">
                        <input type="text" class="textoForm" id="tempo_preparo" name="tempo_preparo" required placeholder="Custo unitário">
                        <input type="text" class="textoForm" id="quantidade_produzida" name="quantidade_produzida" required placeholder="Data de validade">
                        <input type="text" class="textoForm" id="custo_total" name="custo_total" required placeholder="custo_total">
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
                        <input type="text" class="textoForm" id="id_receita" name="id_receita" required placeholder="Código">
                        <input type="text" class="textoForm" id="nome" name="nome" required placeholder="Nome">
                        <input type="text" class="textoForm" id="descricao" name="descricao" required placeholder="Descrição">
                        <input type="text" class="textoForm" id="tempo_preparo" name="tempo_preparo" required placeholder="Custo unitário">
                        <input type="text" class="textoForm" id="quantidade_produzida" name="quantidade_produzida" required placeholder="Data de validade">
                        <input type="text" class="textoForm" id="custo_total" name="custo_total" required placeholder="custo_total">
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
        <h2>RECEITA</h2><br>
        <form action="main_receita.php" method="POST">
    <input type="text" name="nome" id="nome" placeholder="Nome ..." class="form-control" style="display: inline-block; width: auto;">
    
    <button type="submit" name="pesquisar" class="btn">Pesquisar</button>

    <!-- Botão "Cadastrar" com ícone de mais e margem ajustada -->
    <button type="button" class="btn" data-toggle="modal" data-target="#myModalCadastrar" style="margin-left: 630px;">
        <i class="fas fa-plus"></i> Cadastrar
    </button>

    <!-- Botão "Exportar" com ícone de exportação -->
    <button type="button" class="btn" data-toggle="modal" data-target="#myModalExportar">
        <i class="fas fa-file-export"></i> Exportar
    </button>
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
