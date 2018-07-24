<!DOCTYPE html>
<html>
<head>
	<title>Busca por valor</title>
	<meta name="viewport" content="width=device-width,user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css"/>
	<script type="text/javascript" src="assets/script/script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>	
</head>
<body>
	<?php
	include "configure.php";
	require_once "funcoes.php";
	?>
	<div class="container">
		<?php include "menu.php";?>
	</div>
	<div class="valorBusca">
		<form method="POST" onsubmit="return validaValor()">
			<label for="valorMin">Digite o valor mínimo</label>
			<input type="number" name = "valorMin" id="valorMin"/>
			<label for="valorMax">Digite o valor máximo<br></label>
			<input type="number" name="valorMax" id="valorMax"/>
			<input type="submit" name="Pesquisar"/>
		</form>
	</div>	
	<div class="tabelaConta">
		<table border="1">
			<tr>
				<td>ID</td>
				<td>mês</td>
				<td>Descrição</td>
				<td>Valor</td>
				<td>Opções</td>
			</tr>	
		<?php
		// Iremos aqui fazer a busca de acordo com o mes passado pelo formulario
		$smsg = "";
		if(isset($_POST['valorMin']) && empty($_POST['valorMin']) == false) {
			$valorMin = $_POST['valorMin'];	
			$valorMax = $_POST['valorMax'];		
			$sql = "SELECT * FROM contas WHERE valor >= '$valorMin' AND valor <= '$valorMax' ORDER BY valor";
			$sql = $pdo->query($sql);				
			if($sql->rowCount() > 0) {
				foreach ($sql->fetchAll() as $conta) {
					$smsg .= "<tr><td>" .$conta["id"]. "</td>";
					$smsg .= "<td class='mesDado' style='color: #000;'>". $conta["mes"]. "</td>";
					$smsg .= "<td>". $conta["descricao"]. "</td>";
					$smsg .= "<td>R$". number_format($conta["valor"],2,',','.'). "</td>";
					btnOpcoes($conta['id'],$smsg,2);
				}	
			} else {
				echo "<td colspan = '5'>Não há registros para essa faixa de valor entre R$".number_format($valorMin,2,',','.')." e R$".number_format($valorMax,2,',','.')."</td>";
			}
		} else {// Fechamento do if que confere se hÃ¡ valor no campo mÃªs
			"<td colspan = '5'>Preencha todos os campos</td>";
		}
		echo $smsg;	 	
		?>
		</table>
</body>
</html>