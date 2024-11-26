<?php
    $receita = (empty($_POST['receita']))?'null':$_POST['receita'];
    $datainicio = (empty($_POST['datainicio']))?'null':$_POST['datainicio'];
    $datafim = (empty($_POST['datafim']))?'null':$_POST['datafim'];

    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('frangelato');

                if (($receita == 'null') and ($datainicio == 'null')  and ($datafim == 'null'))
                {
                    $datasSelect = "SELECT data_fabricacao FROM processo_fabricacao ORDER BY data_fabricacao";
                    $data = mysql_query($datasSelect);
                    
                    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao ORDER BY data_fabricacao";
                    $quantidade = mysql_query($quantidadeSelect);

                    $nomeSelect = "SELECT id_produto_processo FROM processo_fabricacao ORDER BY data_fabricacao";
                    $nome = mysql_query($nomeSelect);
                    

                }

                if (($receita <> 'null') and ($datainicio == 'null')  and ($datafim == 'null'))
                {
                    $datasSelect = "SELECT data_fabricacao FROM processo_fabricacao WHERE id_produto_processo = $receita  ORDER BY data_fabricacao";
                    $data = mysql_query($datasSelect);
                    
                    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE id_produto_processo = $receita  ORDER BY data_fabricacao";
                    $quantidade = mysql_query($quantidadeSelect);
                    
        
                    $nomeSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE id_produto_processo = $receita  ORDER BY data_fabricacao";
                    $nome = mysql_query($nomeSelect);
                    
                }


                if (($receita <> 'null') and ($datainicio <> 'null')  and ($datafim == 'null'))
                {
                    $datasSelect = "SELECT data_fabricacao FROM processo_fabricacao WHERE id_produto_processo = $receita AND data_fabricacao = '$datainicio' ORDER BY data_fabricacao";
                    $data = mysql_query($datasSelect);
                    
                    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE id_produto_processo = $receita AND data_fabricacao = '$datainicio'  ORDER BY data_fabricacao";
                    $quantidade = mysql_query($quantidadeSelect);
                    
        
                    $nomeSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE id_produto_processo = $receita AND data_fabricacao = '$datainicio'  ORDER BY data_fabricacao";
                    $nome = mysql_query($nomeSelect);
                    
                }

                if (($receita <> 'null') and ($datainicio <> 'null')  and ($datafim <> 'null'))
                {
                    $datasSelect = "SELECT data_fabricacao FROM processo_fabricacao WHERE id_produto_processo = $receita AND data_fabricacao >= '$datainicio' AND data_fabricacao <= '$datafim' ORDER BY data_fabricacao";
                    $data = mysql_query($datasSelect);
                    
                    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE id_produto_processo = $receita AND data_fabricacao >= '$datainicio' AND data_fabricacao <= '$datafim' ORDER BY data_fabricacao";
                    $quantidade = mysql_query($quantidadeSelect);
                    
        
                    $nomeSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE id_produto_processo = $receita AND data_fabricacao >= '$datainicio' AND data_fabricacao <= '$datafim' ORDER BY data_fabricacao";
                    $nome = mysql_query($nomeSelect);
                    
                }

                if (($receita <> 'null') and ($datainicio == 'null')  and ($datafim <> 'null'))
                {
                    $datasSelect = "SELECT data_fabricacao FROM processo_fabricacao WHERE id_produto_processo = $receita AND data_fabricacao = '$datafim' ORDER BY data_fabricacao";
                    $data = mysql_query($datasSelect);
                    
                    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE id_produto_processo = $receita AND data_fabricacao = '$datafim' ORDER BY data_fabricacao";
                    $quantidade = mysql_query($quantidadeSelect);
                    
        
                    $nomeSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE id_produto_processo = $receita AND data_fabricacao = '$datafim' ORDER BY data_fabricacao";
                    $nome = mysql_query($nomeSelect);
                    
                }

                if (($receita == 'null') and ($datainicio <> 'null')  and ($datafim <> 'null'))
                {
                    $datasSelect = "SELECT data_fabricacao FROM processo_fabricacao WHERE data_fabricacao >= '$datainicio' AND data_fabricacao <= '$datafim' ORDER BY data_fabricacao";
                    $data = mysql_query($datasSelect);
                    
                    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE data_fabricacao >= '$datainicio' AND data_fabricacao <= '$datafim' ORDER BY data_fabricacao";
                    $quantidade = mysql_query($quantidadeSelect);
                    
        
                    $nomeSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE data_fabricacao >= '$datainicio' AND data_fabricacao <= '$datafim' ORDER BY data_fabricacao";
                    $nome = mysql_query($nomeSelect);
                    
                }

                if (($receita == 'null') and ($datainicio == 'null')  and ($datafim <> 'null'))
                {
                    $datasSelect = "SELECT data_fabricacao FROM processo_fabricacao WHERE data_fabricacao = '$datafim' ORDER BY data_fabricacao";
                    $data = mysql_query($datasSelect);
                    
                    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE data_fabricacao = '$datafim' ORDER BY data_fabricacao";
                    $quantidade = mysql_query($quantidadeSelect);
                    
        
                    $nomeSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE data_fabricacao = '$datafim' ORDER BY data_fabricacao";
                    $nome = mysql_query($nomeSelect);
                    
                }

                if (($receita == 'null') and ($datainicio <> 'null')  and ($datafim == 'null'))
                {
                    $datasSelect = "SELECT data_fabricacao FROM processo_fabricacao WHERE data_fabricacao = '$datainicio' ORDER BY data_fabricacao";
                    $data = mysql_query($datasSelect);
                    
                    $quantidadeSelect = "SELECT quantidade FROM processo_fabricacao WHERE data_fabricacao = '$datainicio' ORDER BY data_fabricacao";
                    $quantidade = mysql_query($quantidadeSelect);
                    
        
                    $nomeSelect = "SELECT id_produto_processo FROM processo_fabricacao WHERE data_fabricacao = '$datainicio' ORDER BY data_fabricacao";
                    $nome = mysql_query($nomeSelect);
                    
                }

                $quantidadesA = array();
                $datasA = array();
                $nomesA = array();
                $nomesReal = array();

                while ($quantidades = mysql_fetch_array($quantidade)) {
                    $x =  $quantidades['quantidade'];
                    array_push($quantidadesA, $x);
                }

                while ($datas = mysql_fetch_array($data)) {
                    $y =  $datas['data_fabricacao'];
                    array_push($datasA, $y);
                }

                while ($nomes = mysql_fetch_array($nome)) {
                    $z =  $nomes['id_produto_processo'];
                    array_push($nomesA, $z);
                }

                foreach ($nomesA as $ids) {
                    $produtoSelect = "SELECT nome FROM produto WHERE id_produto = '$ids'";
                    $produtoQuery = mysql_query($produtoSelect);
                    while($produtos = mysql_fetch_array($produtoQuery)){
                    $produto = $produtos['nome'];
                    array_push($nomesReal, $produto);
                    }
                }

                $novaData = array();

                foreach($datasA as $data){
                    $infodata = explode("-", $data);
                    $dataDefinitiva = "$infodata[2]/$infodata[1]/$infodata[0]";
                    array_push($novaData, $dataDefinitiva);
                }

                $tudo = array($quantidadesA,$novaData,$nomesReal);
                echo json_encode($tudo);
?>