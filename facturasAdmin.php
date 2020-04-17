<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<TITLE>Admin Facturas</TITLE>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloBase.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estilosFormularios.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloMenu.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>

		<script>

			arregloProductos = new Array();
			

			function validaFormulario(){
				var rfc,expresionRfc;
				rfc=document.getElementById("rfc").value;
				expresionRfc=/^[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?$/;
				if(rfc==""){
					alert("Debes llenar el campo de Rfc");
					return false;
				}else if(rfc.length>14){
					alert("El rfc que ingresaste es muy largo");
					return false;
				}else if(!expresionRfc.test(rfc)){
					alert("El RFC que escribiste no es valido");
					return false;
				}

				var jObject={};
    			for(i in arregloProductos){
        			jObject[i] = arregloProductos[i];
    			}

    			//Luego lo paso por JSON  a un archivo php llamado js.php

    			jObject= JSON.stringify(jObject);
   				document.getElementById("caja_valor").value = jObject;

				return true;
			}

		

    		$(document).ready(function(){
        		$(".agregar").click(function(){
 
           	 		id=$(this).parents("TR").find("TD").eq(0).html();
           	 		producto = $(this).parents("TR").find("TD").eq(1).html();
            		cantidad=$(this).parents("TR").find("TD").eq(3).html();
            		precio=$(this).parents("TR").find("TD").eq(2).html();
            		var añadido=false;

            		$("#tablaMuestra TR").each(function (index) {
            			var campo1;
            			$(this).children("TD").each(function (index2) {
            				switch (index2) {
            					case 0:
            						campo1=$(this).text();
            						break;
            				}
            			});
            			if(id==campo1){
            				alert("Ese producto ya fue añadido a la lista");
            				añadido=true;
            			}
            		});
            		if(!añadido){
            			var nuevaCantidad = window.prompt("Escribe la cantidad de productos que deseas","1");
            			var expresion = /^[0-9]+$/;

            			if (nuevaCantidad == null || nuevaCantidad == "" || !expresion.test(nuevaCantidad)) {
  							alert("Debes de ingresar un valor númerico valido");
						} else {
  							if(nuevaCantidad>parseInt(cantidad)){
  								alert("Ingresaste una cantidad mayor al stock actual revisalo");
  							}else if(nuevaCantidad>0){
  								var nuevoPrecio = parseFloat(nuevaCantidad) * parseFloat(precio);
  								arregloProductos.push(id);
  								arregloProductos.push(producto);
  								arregloProductos.push(nuevaCantidad);
  								arregloProductos.push(nuevoPrecio.toFixed(2));
  								agregarProducto(id,producto,nuevaCantidad,nuevoPrecio.toFixed(2));
  							}else{
  								alert("Debes de ingresar una cantidad mayor a 0");
  							}
  							
						}
            			
            		}

        		});

    		});

    		function eliminar(id){
    			var pos=0;
    			for(i in arregloProductos){
        			if(arregloProductos[i]==id){
        				pos=i;
        				break;
        			}
    			}
    			
    			arregloProductos.splice(pos,1);
    			arregloProductos.splice(pos,1);
    			arregloProductos.splice(pos,1);
    			arregloProductos.splice(pos,1);
    			fila="fila"+id;
    			$("#"+fila).remove();
    		}

    		function agregarProducto(id,producto,cantidad,precio){
    			var fila = '<TR id="fila'+id+'" >';
    			fila += '<TD>'+id+'</TD>';
    			fila += '<TD>'+producto+'</TD>';
    			fila += '<TD>'+cantidad+'</TD>';
    			fila += '<TD>'+precio+'</TD>';
    			fila += '<TD>'+'<BUTTON id="'+id+'"'+'onclick="eliminar(this.id);">Eliminar</BUTTON>'+'</TD>';
    			fila += '</TR'>
    			$("#tablaMuestra").append(fila);
    		}
    </script>

	</HEAD>

	<BODY>
		<HEADER>
			<DIV CLASS="container">
				<CENTER><H1>Sistema de facturas Online</H1></CENTER>
			</DIV>
		</HEADER>
		<BR>
		<CENTER>

			<DIV CLASS="navbar navbar-expand-sm justify-content-center">
				<UL ID="menu" CLASS="navbar-nav">
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="clientesAdmin.html">Clientes</A></LI>
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="productosAdmin.html">Productos</A></LI>
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="facturasAdmin.html">Realizar Facturas</A></LI>
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="#">Cerrar sesi&oacute;n</A></LI>
				</UL>
			</DIV>
			
		</CENTER>
		<HR>

		<DIV CLASS="container">
			<CENTER><H3>Generar Factura</H3>
			<FORM ACTION="php/altaFactura.php" METHOD="POST" ONSUBMIT="return validaFormulario();">
				<DIV CLASS="form-group">
					<LABEL FOR="rfc">RFC: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="rfc" NAME="rfc" SIZE="40" MAXLENGTH="42" REQUIRED>
					</DIV>
				</DIV>
				<div style="margin-bottom:15px;" class="g-recaptcha" data-sitekey="6LdgquQUAAAAABkxvXbNeIB95SF3OCG_FCdBfKzm"></div>

				<input type="text" name="caja_valor" id="caja_valor" value=""  style="display:none">
				<DIV CLASS="col-lg-4">
					<INPUT CLASS="form-control" TYPE="submit" VALUE="Registrar">	
				</DIV>
			</FORM><CENTER>

			<DIV CLASS="table-responsive">
				<TABLE CLASS="table table-striped table-bordered table-hover">
					
					<TR>
						<TH ALIGN="LEFT">Id</TH>
						<TH>Nombre</TH>
						<TH>Precio</TH>
						<TH>Stock</TH>
						<TH>Categor&iacute;a</TH>
						<TH></TH>
					</TR>
					<TR>
						<TD>1</TD>
						<TD>Chocolate</TD>
						<TD>10.50</TD>
						<TD>10</TD>
						<TD>Dulceria</TD>
						<TD><BUTTON CLASS="agregar">Agregar</BUTTON></TD>
					</TR>
					<TR>
						<TD>2</TD>
						<TD>Lata de frijoles</TD>
						<TD>20.00</TD>
						<TD>10</TD>
						<TD>Abarrotes</TD>
						<TD><BUTTON CLASS="agregar">Agregar</BUTTON></TD>
					</TR>
					<TR>
						<TD>3</TD>
						<TD>Paracetamol</TD>
						<TD>11.52</TD>
						<TD>20</TD>
						<TD>Farmacia</TD>
						<TD><BUTTON CLASS="agregar">Agregar</BUTTON></TD>
					</TR>
				</TABLE>
				</DIV>
			

				<CENTER><H3>Visualización productos en la factura</H3></CENTER>
				<CENTER>
				<DIV CLASS="table-responsive">
					<TABLE CLASS="table table-striped table-bordered table-hover" ID="tablaMuestra">
							<THEAD>
								<TH ALIGN="LEFT">Id</TH>
								<TH>Nombre</TH>
								<TH>Cantidad</TH>
								<TH>Precio Total</TH>
								<TH></TH>	
							</THEAD>
							
						</TABLE>
					</DIV>
			
				</CENTER>
		</DIV>
		<FOOTER>
			<DIV CLASS="container">
				<P CLASS="h6">P&aacute;gina ofrecida para el control de facturas de la Miscelanea </P>
			</DIV>
		</FOOTER>
		<script type="bootstrap/js/jquery.js"></script>
		<script type="bootstrap/js/bootstrap.min.js"></script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</BODY>
</HTML>