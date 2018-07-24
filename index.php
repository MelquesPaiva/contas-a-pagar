<!DOCTYPE html>
<html>
<head>
	<title>Contas</title>
	<meta name="viewport" content="width=device-width,user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css"/>
	<script type="text/javascript" src="assets/script/script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<?php
	require "configure.php";
	require "iniciarSessao.php";	
	if(isset($_POST['mes']) && empty($_POST['mes']) == false) {
		$mes = addslashes($_POST['mes']);			//addslashes - Evitando sqlInjection
		$desc = addslashes($_POST['descricao']);		
		$valor = addslashes($_POST['valor']);
		$idUsu = addslashes($_SESSION['id']);

		$sql = "INSERT INTO contas (mes, descricao, valor,idUsu) VALUES ('$mes', '$desc', '$valor', '$idUsu')";
		$sql = $pdo->query($sql);	/*Executando comando sql*/
		echo "<script>alert('Dados Salvos com sucesso!');</script>";			  
	} 
?>	
	<div class="container">
		<?php include "menu.php" ?>
	</div>	
	<div class="conta">
		<form method="POST" onsubmit="return validar()">
			<label for="mes">Mês</label>
			<!-- <input type="number" max="12" min="1" name="mes" id="mes" /> -->
			<input type="date" name="mes" id="mes" />
			<div id="mes-nome"></div>
			<label for="descricao">Descrição</label>
			<input type="text" name="descricao" id="descricao" maxlength="20" />
			<label for="valor">Valor</label>
			<input type="text" name="valor" id="valor"/>
			<div class="botoes">
				<input type="submit" name="Enviar"/>
				<input type="reset" name="Limpar Tudo"/>
			</div>
		</form>
	</div>
</body>
</html>