<?php
require "configure.php";

session_start();

if(isset($_POST['email']) && empty($_POST['email']) == false) {
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));
	$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
	$sql = $pdo->query($sql);
	if($sql->rowCount() > 0) {
		$dado = $sql->fetch();
		$_SESSION['id'] = $dado['id'];
		header("Location:index.php");
	} else {
		echo "<script>alert('Dados invalidos ou usuário não cadastrado')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width,user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css"/>
	<script type="text/javascript" src="assets/script/script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<div class="container containerLogin">
	<div class="titulo ">
		<a href="login.php" style="color: #fff">Login no Contas a Pagar</a>
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
	<div class="opcoes">
		<a href="">Esqueceu a senha?</a>
		<a href="novoCadastro.php">Cadastrar</a>
	</div>
<div>	
</body>
</html>