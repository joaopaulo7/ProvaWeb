<div class="container">
    <div class="masthead">
		<div id="cadastro-e-login">
              		<?php
                   		if(null != $this->session->userdata('logado')) {
					echo "Seja bem-vindo: " . $this->session->userdata('cliente')->nome . " " .
						$this->session->userdata('cliente')->sobrenome .
						anchor(base_url("home"), " Início ").
						anchor(base_url("logout"), " Logout ");
				} else {
					echo anchor(base_url("cadastro"), "Cadastro ") .
						anchor(base_url("login"), "Login");
				}
				echo anchor(base_url("carrinho"), " Carrinho [".$this->cart->total_items()."] ");
			?>
         </div>

        <?php
            echo heading('Lojão do Terceirão', 3, 'class="muted"');
        ?>
        <ul class="nav nav-tabs">
            <li class="active">
                <?php
                    echo anchor(base_url("produtos"), "Produtos<b class='caret'></b>",
                    array("class"=>"dropdown-toggle", "data-toggle"=>"dropdown"));
                ?>
                <ul class="dropdown-menu">
					<?php
						foreach($categorias as $categoria) {
							echo "<li>".anchor(base_url("categoria/".$categoria->id."/".limpar($categoria->titulo)), $categoria->titulo)."</li>";
						}
					?>
                </ul>
            </li>
            <li> <?php echo anchor(base_url('fale_concosco'), "Fale Conosco") ?>
            </li>
            <li> <?php $atributos = array("name" => "form_busca", "class" => "navbar-search pull-right");
                       echo form_open(base_url("home/buscar"), $atributos);
                       echo form_input(array('type' => 'text', 'name' => 'txt_busca', 'placeholder' => 'buscar', 'class' => 'search-query'));
                       echo form_input(array('type'=>'submit', 'name'=>'btn_busca', 'value' => 'Buscar'));
                       echo form_close();
                   ?>
            </li>
        </ul>
    </div>

