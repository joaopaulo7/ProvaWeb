    <?php 
		include_once 'fpdf/fpdf.php';
		$gg = utf8_encode("ratos de ratos");
		$PDF = new FPDF('p', 'pt', 'A4');
		$PDF -> SetTitle("Relatorio bandas");
		$PDF -> SetAuthor('Autor');
		$PDF -> SetCreator('Php'.phpversion());
		$PDF -> SetKeywords('teste','php','pdf');
		$PDF -> SetSubject('Como criar um pdf em php =)');
		$PDF -> AddPage();
		$PDF -> SetFont('arial','',12);
		$PDF -> Ln(20);
		//texto
			$PDF -> SetFont('Courier','B',24);
			$PDF -> SetY(20);
			$PDF -> SetX(170);
			$PDF -> Write(20,'Bandas Cadastradas');
		$y = 20;
		foreach($band as $banda){
			$y += 100;
			$PDF -> SetFont('courier','B',16);
			$PDF -> SetY($y);
			$PDF -> SetX(220);
			$titulo = $banda->id.'-'.$banda->nome;
			$titulo = utf8_decode($titulo);
			$PDF -> Write(30, $titulo);
			$PDF -> Ln(30);
			$txt = 'Quantidade de Integrantes: '.$banda->quantidade_integrantes;
			$txt = utf8_decode($txt);
			$PDF -> Ln(30);
			$PDF -> SetFont('times','B',14);
			$PDF -> Write(10,$txt);
			$txt = 'Data de fundação: '.$banda->data_fundacao;
			$txt = utf8_decode($txt);
			$PDF -> SetFont('times','B',14);
			$PDF -> SetX(29);
			$PDF -> Write(50,$txt);
			$PDF -> Ln(30);
			$PDF -> line(20, $y+100, 560, $y+100);
		}
		//Imprimir um hyperlink
		$PDF ->OutPut();
