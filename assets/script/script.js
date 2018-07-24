function validar() {
	var mes = document.getElementById("mes").value;
	var desc = document.getElementById("descricao").value;
	var valor = document.getElementById("valor").value;

	if(mes == "" || desc == "" || valor == "") {
		alert('Todos os campos devem ser preenchidos');
		return false;
	} else { 
		if(desc.length() > 20) {
			alert('A descrição não pode ter mais de 20 carateceres');
			return false;
		}
	}
	return true;		
}
function validaValor() {
	var vMin = document.getElementById("valorMin").value;
	var vMax = document.getElementById("valorMax").value;	

	if(vMin == "" || vMax == "") {
		alert("Todos os campos devem ser preenchidos");
		return false;
	} else {
		if(vMin < 0 || vMax < 0) {
			alert("Os campos não podem apresentar valores negativos");
			return false;
		}
	}
	return true;
}
function confirmaPagamento(tipo) {
	var btn = document.getElementById("pagar");
	switch (tipo) {
		case 0:
			if(confirm("Deseja cancelar o pagamento?")) {
				// btn.style.backgroundColor = '#8A0808';
				// pagar.innerHTML = "Pagar";
				return true; 
			}
			break;			
		case 1:
			if(confirm("Deseja confimar o pagamento?")) {
				// btn.style.backgroundColor = '#0B610B';
				// pagar.innerHTML = "Está Pago"
				return true; 
			}
			break;			
	}	
	return false;
}
function excluir() {
	if(confirm("Deseja deletar os dados?")) {
		return true;
	} else {
		return false;
	}

}	

function confirmarSair() {
	if(confirm("Deseja sair?")) {
		return true;
	} else {
		return false;
	}
}
