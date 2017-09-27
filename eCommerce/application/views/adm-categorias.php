<div id="homebody">
    <div class="row-fluid">
        <?php
            $contador = 0;
            echo "<table border='1'>
            <tr>
            <th>Título</th>
            <th>Descricao</th>
            <th>Alterar</th>
            <th>Excluir</th>
            </tr>";
            foreach($categorias as $categoria) {
                $contador++;
                echo "<tr>";
                echo "<td>".$categoria->titulo."</td>";
                echo "<td>".word_limiter($categoria->descricao)."</td>";
                echo "<td>".anchor(base_url("admCategorias/verCategoria/". $categoria->id), "Alterar")."</td>";
                echo "<td>".anchor(base_url("admCategorias/delCategoria/". $categoria->id), "Deletar")."</td>";
                echo "</tr>";
            }
            echo anchor(base_url("admCategorias/verCategoria/0"),"Adicionar Nova");
        ?>
    </div>
</div>
