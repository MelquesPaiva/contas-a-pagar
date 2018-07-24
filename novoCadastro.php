<?php
require "configure.php";
if(isset($_POST['email']) && empty($_POST['email']) == false) {
	$email = addslashes($_POST['email']);			//addslashes - Evitando sqlInjection
	$senha = md5(addslashes($_POST['senha']));	

	$sql = "INSERT INTO usuarios (email,senha) VALUES ('$email', '$senha')";
	$sql = $pdo->query($sql);	/*Executando comando sql*/
	echo "<script>alert('Dados Salvos com sucesso!');</script>";
	header("Location: login.php");			  
} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Novo Cadastro</title>
	<meta name="viewport" content="width=device-width,user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css"/>
	<script type="text/javascript" src="assets/script/script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<div class="container containerLogin">
	<div class="titulo ">
		<a href="login.php" style="color: #fff">Novo Cadastro</a>
	</div>
</div>	
<div class="conta login">	
	<form method="POST">
		<label for="email">Email</label>
		<input type="email" name="email"/>
		<label for="senha">Senha</label>
		<input type="password" name="senha"/>
		<input type="submit" name="Logar"/>
	</form>
</div>
</body>
</html>