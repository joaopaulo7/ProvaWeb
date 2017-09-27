<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Seja bem-vindo à área administrativa.</h3>
        <p>Aqui você pode incluir, alterar ou excluir registros nas tabelas de categorias, produtos ou fretes.</p>
    </div>
    <div class="row-fluid">
        <table style="width:100%">
            <tr>
                <td><?php echo anchor(base_url("admCategorias") ,"Cadastro de Categorias", array("class"=>"btn btn-mediun btn-primary")); ?></td>
                <td><?php echo anchor(base_url("cadastro_produtos") ,"Cadastro de Produtos", array("class"=>"btn btn-mediun btn-primary")); ?></td>
                <td><?php echo anchor(base_url("cadastro_fretes") ,"Cadastro de Fretes", array("class"=>"btn btn-mediun btn-primary")); ?></td>
            </tr>
        </table>
    </div>
</div>
