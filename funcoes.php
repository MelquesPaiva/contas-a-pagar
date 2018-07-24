<?php
function btnOpcoes($id, &$smsg, $idPg) {
	/*idPg = 0 -> todasAsContas
	  idPg = 1 -> buscaMes
	  idPg = 2 -> buscaValor*/
	// if($pago == 0) {
	// 	$smsg .= "<td><a href='pagar.php?id=".$id."&idPg=".$idPg."&pago=".$pago."' onclick='return confirmaPagamento(1)' style='background-color: #8A0808; color: #fff;'>Pagar</a>|";
	// } else {
	// 	$smsg .= "<td><a href='pagar.php?id=".$id."&idPg=".$idPg."&pago=".$pago."' onclick='return confirmaPagamento(0)' style='background-color: #0B610B; color: #fff;'>Está Pago</a>|";
	// }
	$smsg .= "<td><a href='pagar.php?id=".$id."&idPg=".$idPg."' onclick='return confirmaPagamento(1)' style='background-color: #8A0808; color: #fff'; id='pagar'>Pagar</a>|";


	$smsg .= "<a href='excluir.php?id=".$id."&idPg=".$idPg."' onclick='return excluir()'>Excluir</a>|
		  	  <a href='atualiza.php?id=".$id."&idPg=".$idPg."'>Atualizar</a></td></tr>";
}

function redirecionar($idPg) {
	switch ($idPg) {
	case 0:
		Header("HTTP/1.1 301 Moved Permanently");
		Header("Location:todasContas.php");
		break;
	case 1:
		Header("HTTP/1.1 301 Moved Permanently");
		Header("Location:buscames.php");
		break;
	case 2:
		Header("HTTP/1.1 301 Moved Permanently");
		Header("Location:buscaValor.php");
		break;
	default:
		Header("HTTP/1.1 301 Moved Permanently");
		Header("Location:index.php");
		break;
	}
}

?>