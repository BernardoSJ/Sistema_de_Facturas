function validaFormulario(){
	var rfc,expresionRfc;
	rfc=document.getElementById("rfc").value;
	expresionRfc=/^[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?$/;
	if(rfc==""){
		alert("Debes llenar el campo de Rfc");
		return false;
	}else if(!expresionRfc.test(rfc)){
		alert("El RFC que escribiste no es valido");
		return false;
	}
	return true;
}