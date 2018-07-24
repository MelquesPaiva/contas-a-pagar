<!DOCTYPE html>
<html>
<head>
	<title>Busca por m�s</title>
	<meta name="viewport" content="width=device-width,user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css"/>
	<script type="text/javascript" src="assets/script/script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>

	<?php 
	include "configure.php";
	require_once "funcoes.php";
	?>
</head>
<body>
	<div class="container">
		<?php include "menu.php";?>
	</div>	
	<div class="mesBusca">
		<form method="POST" action="buscames.php">
			<label for="mes-busca">Digite o numero do m�s a ser buscado<br><span style="font-weight: bold;">(EX: 1 = JANEIRO, 2 = FEVEREIRO)</span></label>
			<input type="number" max="12" min="1" name="mes-busca" id="mes-busca"/>
			<input type="submit" name="Enviar"/>
		</form>
	</div>	
	<div class="tabelaConta">
		<table border="1">
			<tr>
				<td>ID</td>
				<td>M�s</td>
				<td>Descri��o</td>
				<td>Valor</td>
				<td>Op��es</td>
			</tr>	
		<?php
		// Iremos aqui fazer a busca de acordo com o mes passado pelo formulario
		$smsg = "";
		if(isset($_POST['mes-busca'])) {
			$mes = $_POST['mes-busca'];				
			$sql = "SELECT * FROM contas WHERE MONTH(mes) = $mes ORDER BY valor";
			$sql = $pdo->query($sql);	
			$vTotal = 0;
			if($sql->rowCount() > 0) {
				foreach ($sql->fetchAll() as $conta) {
					$vTotal = $vTotal + $conta["valor"];
					$smsg .= "<tr><td>" .$conta["id"]. "</td>";
					$smsg .= "<td class='mesDado' style='color: #000;'>". $conta["mes"]. "</td>";
					$smsg .= "<td>". $conta["descricao"]. "</td>";
					$smsg .= "<td>R$". number_format($conta["valor"],2,',','.'). "</td>";
					btnOpcoes($conta['id'],$smsg,1);
				}	
			} else {
				echo "<td colspan = '5'>N�o h� registros no m�s $mes</td>";
			}
		}// Fechamento do if que confere se h� valor no campo m�s
		echo $smsg;	 	
		?>
		</table>
	</div>		
	<div class="valorTotalMes">
		<?php
			if(isset($_POST['mes-busca'])) {
				echo "Valor total no m�s = <span style='font-weight:bold;'>R$" . number_format($vTotal,2,',','.'). "</span>";
			}
		?>	
	</div>	
</body>
</html>
