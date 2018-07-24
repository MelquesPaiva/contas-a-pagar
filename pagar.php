<?php
include "configure.php";
require_once "funcoes.php";

$id = 0;
$idPg = $_GET['idPg'];	
if(isset($_GET['id']) && empty($_GET['id']) == false) {
	$id = addslashes($_GET['id']);
	$sql = "SELECT * FROM contas WHERE id = $id";		
	$sql = $pdo->query($sql);
	if($sql->rowCount() > 0) {
		$dado = $sql->fetch();
	}
	$pago = $dado["pago"];
	$sql = "UPDATE contas SET pago=!$pago WHERE id=$id";
	redirecionar($idPg);
}
?>