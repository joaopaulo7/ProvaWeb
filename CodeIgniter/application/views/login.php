<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login Sis.Req</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<?php
				//echo link_tag('assets/css/bootstrap.min.css');
				//echo link_tag('assets/css/estilo.css');
			?>
    </head>
    <body>
        <div>
            <form method="POST" action="login/login">
                <label for="login">
                    Login:
                </label>
                <input type="text" id="login" name="login"><br>
                <label for="senha">
                    Senha:
                </label>
                <input type="password" name="senha" id="senha"><br>
                <button type="submit">
                    Enviar
                </button>
            </form>
        </div>
      </body>
</html>
