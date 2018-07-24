<?php
	require "configure.php";
	$id = 0;
	if(isset($_GET['id']) && empty($_GET['id']) == false) {
		$id = addslashes($_GET['id']);

		$sql = "SELECT * FROM usuarios WHERE id = $id";
		$sql = $pdo->query($sql);
		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();     	//fetch() para pegar apenas um resultado
		}
	} else {
		Header("HTTP/1.1 301 Moved Permanently");
		Header("Location:index.php");
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualizar</title>
</head>
<body>
	<form method="POST">
		<label for="nome">Nome</label>
		<input type="text" name="nome" id="nome" value="" />
		<label for="email">Email</label>
		<input type="email" name="email" id="email" value="" />
		<label for="senha">Senha</label>
		<input type="password" name="senha" id="senha" value="" />	
		<input type="submit" name="Cadastrar"/>	
	</form>
</body>
</html>