function validaFormularioInsertar(){
	var rfc,nombre,apellidoP,apellidoM,calle,numero,colonia,cp,expresionRfc,expresionNumero,expresionCp;
	rfc=document.getElementById("rfc").value.toUpperCase();
	nombre=document.getElementById("nombre").value.toUpperCase();
	apellidoP=document.getElementById("apellidoP").value.toUpperCase();
	apellidoM=document.getElementById("apellidoM").value.toUpperCase();
	calle=document.getElementById("calle").value.toUpperCase();
	numero=document.getElementById("numero").value;
	colonia=document.getElementById("colonia").value.toUpperCase();
	cp=document.getElementById("cp").value;
	expresionRfc=/^[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?$/;
	expresionNumero=/^[0-9]{3,4}$/;
	expresionCp=/^[0-9]{5}$/;

	if(rfc=="" || nombre=="" || apellidoP=="" || apellidoM=="" || calle=="" || numero=="" || colonia=="" || cp==""){
		alert("Debes de llenar todos los campos");
		return false;
	}else if(rfc.length>14){
		alert("El RFC que ingresaste es muy largo");
		return false;
	}else if(!expresionRfc.test(rfc)){
		alert("El RFC que ingresaste esta mal escrito");
		return false;
	}else if(nombre.length>30){
		alert("El nombre que ingresaste es muy largo");
		return false;
	}else if (apellidoP.length>30){ 
		alert("El apellido Paterno es muy largo");
		return false;
	}else if(apellidoM.length>30){
		alert("El apellido Materno es muy largo");
		return false;
	}else if(calle.length>30){
		alert("El nombre de la calle es muy largo");
		return false;
	}else if(numero.length>4){
		alert("El número de casa que ingresaste es muy largo");
		return false;
	}else if(!expresionNumero.test(numero)){
		alert("No ingresaste un número de casa valido");
		return false;
	}else if(colonia.length>30){
		alert("El nombre de la colonia es muy largo");
		return false;
	}else if(cp.length>5){
		alert("El CP que ingresaste es muy largo");
		return false;
	}else if(!expresionCp.test(cp)){
		alert("No ingresaste un CP Valido");
		return false;
	}
	return true;
}

function validaFormularioBuscarCliente(){
	var busqueda,criterio;
	busqueda=document.getElementById("busca").value;
	criterio=document.getElementById("criterio").value;
	if(busqueda==""){
		alert("El campo de Buscar no debe estar vacio");
		return false;
	}
	alert("La busqueda es "+busqueda+" el criterio es "+criterio);
	return true;
}