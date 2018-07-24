<?php
	session_start();
	if(isset($_SESSION['id']) && empty($_SESSION['id']) == true) {
		header("Location: login.php");
	} else {
		$idUsu = addslashes($_SESSION['id']);	
	}	
	echo $idUsu;
?>