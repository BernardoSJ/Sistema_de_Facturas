function validaFormulario(){
	var busca,expresionBusca;
	busca=document.getElementById("busca").value;
	expresionBusca=/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/;

	if(busca==""){
		alert("Debes de llenar el campo de fecha");
		return false;
	}else if(!expresionBusca.test(busca)){
		alert("La fecha que escribiste no es valida");
		return false;
	}
	return true;
}