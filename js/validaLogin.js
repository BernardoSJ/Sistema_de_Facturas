function validaFormulario(){
	var user,pass,expresion;
	user=document.getElementById("user").value.toUpperCase();
	pass=document.getElementById("pass").value;
	expresion=/^[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?$/;

	if(user=="" || pass==""){
		alert("Favor de llenar todos los campos");
		return false;
	}else if(user.length>14){
		alert("El RFC ingresado es muy largo");
		return false;
	}else if(!expresion.test(user)){
		alert("El RFC que ingresaste esta mal escrito");
		return false;
	}
	return true;
	
}