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

			echo 	heading("Adicionar banda", 3).
				form_open('Entrar/menu/adicionar', $atributos).
				form_label("Nome: ", "nome").br().
				form_input('nome').br().
				form_label("Quantidade de Integrantes: ", "quantidade_integrantes").br().
				form_input('quantidade_integrantes').br().
				form_label("Data de Fundação: ", "data_fundacao").br().
				form_input('dia').
				form_input('mes').
				form_input('ano').br().
				form_submit("btn btn-default", "Cadastrar Nova banda").form_close().
				
				
				heading("bandas existentes", 3);
				
				foreach($bandas as $post){
					echo '<div class="artigo" role="article">';
					echo " banda: ".$post->id.br().
					     'Nome: '.$post->nome.br().'  quantidade de integrantes: '.$post->quantidade_integrantes.br().' Data de fundação: '.date("d/m/Y", strtotime($post->data_fundacao)).br();
					echo anchor("Entrar/menu/excluir/".$post->id, "Excluir ");
					echo anchor("Entrar/menu/alterar/".$post->id, " Alterar")."<hr>";
					echo '</div>';
				}
		?>
		</div>
	</body>
</html>
