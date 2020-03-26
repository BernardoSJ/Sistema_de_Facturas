function validaFormularioInsertar(){
	var nombre,precio,stock,categoria,expresionPrecio;
	nombre=document.getElementById("nombre").value.toUpperCase();
	precio=document.getElementById("precio").value;
	stock=document.getElementById("stock").value;
	categoria=document.getElementById("categoria").value;
	expresionPrecio=/[0-9]+\.+[0-9]{2}?$/;

	if(nombre=="" || precio=="" || stock==""){
		alert("Todos los campos deben estar llenos");
		return false;
	}else if(nombre.length>30){
		alert("El nombre que ingresaste es muy largo");
		return false;
	}else if(!expresionPrecio.test(precio)){
		alert("El precio que ingresaste no es valido");
		return false;
	}
	return true;
}

function validaFormularioBuscarProducto(){
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