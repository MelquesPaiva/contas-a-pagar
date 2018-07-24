<?php
include "configure.php";
include "funcoes.php";

$id = $_GET["id"];	
$idPg = $_GET["idPg"];	
$sql = "DELETE FROM contas WHERE id = $id";
$pdo->query($sql);							/*Executando comando sql*/	
echo "Excluído o id $id";

redirecionar($idPg);

?>