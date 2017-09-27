<!doctype html>
   <html>
        <head>
            <meta charset="utf-8">
            <title>Lojão do Terceirão</title>
        </head>
        <body>
            <h2>Lojão do Terceirão</h2>
            <h3>Confirmação de cadastro</h3>
            <p>Olá: <?php echo $nome . " " . $sobrenome ?>.<br>
                Muito obrigado por se cadastrar e liberar sua conta para compras, clique no link abaixo.</p>
            <p><a href="<?php echo base_url("cadastro/confirmar/".md5($email)) ?>">Confirmar cadastro no website!</a></p>
            <h4>Seja bem-vindo e boas compras!<br>Lojão do Terceirão.</h4>        
        </body>
</html>
