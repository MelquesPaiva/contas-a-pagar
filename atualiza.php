<!DOCTYPE html>
<html>
<head>
	<title>Atualizar</title>
	<title>Busca por mÃªs</title>
	<meta name="viewport" content="width=device-width,user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css"/>
	<script type="text/javascript" src="assets/script/script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>

	<?php
	include "configure.php";
	$id = 0;
	if(isset($_GET['id']) && empty($_GET['id']) == false) {
		$id = addslashes($_GET['id']);
	}

	if(isset($_POST['mes']) && empty($_POST['mes']) == false) {		//Caso usuario envie os dados
		$mes = addslashes($_POST['mes']);
		$desc = addslashes($_POST['descricao']);
		$valor = addslashes($_POST['valor']);

		$sql = "UPDATE contas SET mes = '$mes', descricao = '$desc', valor = '$valor' WHERE id = '$id'";
		$pdo->query($sql);		/*Executando update*/

		Header("HTTP/1.1 301 Moved Permanently");
		Header("Location:index.php");
	}
	
	$sql = "SELECT * FROM contas WHERE id = '$id'";
	$sql = $pdo->query($sql);
	if($sql->rowCount() > 0) {
		$dado = $sql->fetch(); 		//Pegando apenas um dado
	} else {
		Header("HTTP/1.1 301 Moved Permanently");
		Header("Location:index.php");
	}
	?>
</head>
<body>
	<div class="container">
		<?php include "menu.php" ?>
	</div>	
	<div class="conta">
		<form method="POST" onsubmit="return validar()">
			<label for="mes">Mês</label>
			<!-- <input type="number" max="12" min="1" name="mes" id="mes" /> -->
			<input type="date" name="mes" id="mes" value="<?php echo $dado['mes']?>" />			
			<label for="descricao">Descrição</label>
			<input type="text" name="descricao" id="descricao" maxlength="20" value="<?php echo $dado['descricao']?>" />
			<label for="valor">Valor</label>
			<input type="text" name="valor" id="valor" value="<?php echo $dado['valor']?>" />
			<input type="submit" name="Enviar"/>
		</form>
	</div>		
</body>
</html>