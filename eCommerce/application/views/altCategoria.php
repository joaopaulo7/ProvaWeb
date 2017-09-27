<div id="homebody">
    <div class="row-fluid">
        <?php
            echo form_open(base_url('/admCategorias/altCategoria'), array('id'=>'form_altCat')) .
                form_input(array( 'type'=> 'hidden','id'=>'id', 'name'=>'id', 'value'=> $categoria->id)).
                form_input(array('id'=>'titulo', 'name'=>'titulo', 'value' =>$categoria->titulo)).br().
                form_textarea(array('id'=>'descricao', 'name'=>'descricao', 'value' =>$categoria->descricao)) .
                form_submit("btnAlterar", "Alterar") .
                form_close();
        ?>
    </div>
</div>

