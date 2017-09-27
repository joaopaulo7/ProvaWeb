<div class="container">
    <div class="masthead">
        <div id="cadastro-e-login">
                    <?php
                        if(null != $this->session->userdata('logado')) {
                    echo "Seja bem-vindo: " . $this->session->userdata('cliente')->nome . " " .
                        $this->session->userdata('cliente')->sobrenome .
                        anchor(base_url("menuAdm"), " Início ").
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
                    echo anchor(base_url("menuAdm"), "Home");
                ?>
            </li>
        </ul>
    </div>


