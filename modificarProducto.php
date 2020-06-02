<?php
	if(!empty($_POST)){
		include("php/conexion.php");
		$id=$_POST['idModificar'];

		$consulta="SELECT id,nombre,FORMAT(precio,2),stock,categoria FROM productos WHERE id=$id";
		$resultado=$conexion->query($consulta);
		$respuesta=$resultado->fetch_array();
	}
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<TITLE>Modificar Producto</TITLE>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloBase.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estilosFormularios.css">

		<script>
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
		</script>
 

	</HEAD>

	<BODY>
		<HEADER>
			<DIV CLASS="container">
				<CENTER><H1>Sistema de facturas Online</H1></CENTER>
			</DIV>
		</HEADER>
		
		<DIV CLASS="container">
			<CENTER><H2>Productos</H2></CENTER>
			<CENTER><H3>Modificar producto</H3></CENTER>
			<CENTER><FORM ACTION="php/actualizaProducto.php" METHOD="POST" ONSUBMIT="return validaFormularioInsertar();">
				<DIV CLASS="form-group">

					<INPUT TYPE="hidden" ID="id" NAME="id" VALUE="<?php echo $respuesta['id']; ?>">
					<LABEL FOR="nombre">Nombre: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="nombre" NAME="nombre" SIZE="30" MAXLENGTH="32" VALUE="<?php echo $respuesta['nombre']; ?>" PLACEHOLDER="Nombre" REQUIRED>	
					</DIV>
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="precio">Precio: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="precio" NAME="precio" SIZE="6" MAXLENGTH="8" VALUE="<?php echo $respuesta['FORMAT(precio,2)']; ?>" PLACEHOLDER="Precio" REQUIRED>
					</DIV>
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="stock">Stock: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="number" ID="stock" NAME="stock" SIZE="2" MAXLENGTH="3" VALUE="<?php echo $respuesta['stock']; ?>" PLACEHOLDER="Stock" REQUIRED>
					</DIV>		
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="categoria">Categor&iacute;a: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<SELECT CLASS="form-control" ID="categoria" NAME="categoria">
							<OPTION <?php if($respuesta['categoria']=="ABARROTES") echo "selected";?>>Abarrotes
							<OPTION <?php if($respuesta['categoria']=="FARMACIA") echo "selected";?>>Farmacia
							<OPTION <?php if($respuesta['categoria']=="DULCERIA") echo "selected";?>>Dulceria
							<OPTION <?php if($respuesta['categoria']=="LACTEOS") echo "selected";?>>Lacteos
							<OPTION <?php if($respuesta['categoria']=="CREMERIA") echo "selected";?>>Cremeria
							<OPTION <?php if($respuesta['categoria']=="PAPELERIA") echo "selected";?>>Papeleria
						</SELECT>
					</DIV>
				</DIV>
				<div style="margin-bottom:15px;" class="g-recaptcha" data-sitekey="6LdgquQUAAAAABkxvXbNeIB95SF3OCG_FCdBfKzm"></div>
				<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
					<INPUT CLASS="form-control" TYPE="submit" VALUE="Registrar">
				</DIV>
			</FORM></CENTER>
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

