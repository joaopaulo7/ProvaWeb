<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Meu Blog - Admnistracao</title>
		<?php
			echo link_tag('assets/css/bootstrap.min.css');
			echo link_tag('assets/css/estilo.css');
		?>
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
		<div class="container">
		<?php
			echo anchor('Entrar/menu' ,"Home").anchor("Entrar/menu", " bandas ").
			anchor("login/logout", " Logout ").anchor("Entrar/menu/pdf/", "gerar pdf");
		?>
		</div>
		</nav>
		<div class="container">
		<?php	
			$atributos = array('name'=>'formulario_banda', 'id'=>'formulario_banda');

			echo 	heading("Alterar banda", 3).
				form_open('Entrar/menu/salvar_alteracao', $atributos).
				form_hidden('id', $banda[0]->id).
				form_label("Nome: ", "nome").br().
				form_input('nome', $banda[0]->nome).br().
				form_label("Quantidade de integrantes: ", "quantidade_integrantes").br().
				form_input('quantidade_integrantes', $banda[0]->quantidade_integrantes).br().
				form_label("Data de Fundação: ", "data_fundacao").br().
				form_input('data_fundacao', $banda[0]->data_fundacao).br().
				form_submit("btn_enviar", "Salvar banda").form_close();
				?>
				</div>
	</body>
</html>
