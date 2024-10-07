var contador = 0;

function addinsumo(){
    contador += 1;
    let modal = document.querySelector('.modal-body1');
    let novoselect = `<select name="insumo`+contador+`'">
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
                </select>`;
    
    modal.insertAdjacentHTML('beforeend', novoselect);
}