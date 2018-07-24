<!DOCTYPE html>
<html>
<head>
	<title>Todas as contas</title>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
	<script type="text/javascript" src="assets/script/script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<?php 
	  require "configure.php";
	  require_once "funcoes.php";
	  require "iniciarSessao.php";

	?>
</head>
<body>
	<div class="container contas">		
		<!-- <div class="voltar">
			<a href="index.php" class="btnVoltar">Página Inicial</a>
		</div> -->
		<?php include "menu.php";?>
	</div>	
	<div class="tabelaConta">
		<table border="1">
			<tr>
				<td>ID</td>
				<td>Mês</td>
				<td>Descrição</td>
				<td>Valor</td>
				<td>Opções</td>
			</tr>
			<?php
			$smsg = "";				
			$sql = "SELECT contas.id, contas.mes,contas.descricao, contas.valor FROM contas INNER JOIN usuarios ON contas.idUsu= '$idUsu' AND contas.idUsu = usuarios.id ORDER BY contas.mes";
			$sql = $pdo->query($sql);					/*Mandando o sql*/					
			if($sql->rowCount() > 0) {
				// echo "HÃ¡ registros<br>";
				foreach ($sql->fetchAll() as $conta) {	
					$smsg .= "<tr><td>".$conta["id"]."</td>";
					$smsg .= "<td class='mesDado' style='color: #000;'>".$conta["mes"]."</td>";
					$smsg .= "<td>".$conta["descricao"]."</td>";
					$smsg .= "<td>R$".number_format($conta["valor"],2,',','.')."</td>";
					btnOpcoes($conta['id'], $smsg, 0);
				}						
			} else {
				echo "<td colspan = '5'>Não há registros<br></td></tr>";
			}				
			echo $smsg;	
			?>
		</table>
	</div>	
</body>
</html>


