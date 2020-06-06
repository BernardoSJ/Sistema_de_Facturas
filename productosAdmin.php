<?php
	@session_start();
	if(!isset($_SESSION['user'])){
		echo '<script>location.href="index.php"; </script>';
	}else if($_SESSION['tipou']=="CLIENTE"){
		echo '<script>location.href="indexCliente.php"; </script>';
	}
	include("php/conexion.php");
	$condicion="";
	if(!empty($_POST)){
		
		$busca = strtoupper($_POST['busca']);
		$criterio = strtolower($_POST['criterio']);
		
		$condicion = "WHERE $criterio LIKE '%$busca%'";
	}

	$sql = "SELECT id,nombre,FORMAT(precio,2),stock,categoria FROM productos $condicion";

	$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<TITLE>Admin Productos</TITLE>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloBase.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloMenu.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estilosFormularios.css">

		<style type="text/css">
			#tformulario{
				width:0%;
				border:1px;
				margin:0px;
			}
		</style>

		<script type="text/javascript" src="js/validaPaginaAdminProducto.js"></script>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
 
    	<script>

    		$(document).ready(function(){
 				$("#formInsercion").submit(function(){
   					var response = grecaptcha.getResponse();
      				if(response.length == 0){
          				alert('Por favor chequear la Captcha');
    					return false;}});});

    		function BuscarProducto(){
				var busqueda,criterio;
				busqueda=document.getElementById("busca").value.toLowerCase();
				criterio=document.getElementById("criterio").value.toLowerCase();
				if(busqueda==""){
					alert("El campo de Buscar no debe estar vacio");
				}else{
					var parametros = {
                		"busca" : busqueda,
                		"criterio" : criterio
        			};
					$.ajax({
						url:"productosAdmin.php",
						type:"POST",
						data:parametros,
						success: function(response){
							$("BODY").html(response);
						}
					});
					
				}
			}

			function eliminaProducto(idProducto){
				var decision = confirm("¿Seguro que desea eliminar el registro?");
				if(decision==true){
					var parametros = {
                		"id" : idProducto
        			};
					$.ajax({
						url:"php/eliminarProducto.php",
						type:"POST",
						data:parametros,
						success: function(response){
							alert(response);
							location.reload();
						}
					});
				}
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
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="clientesAdmin.php">Clientes</A></LI>
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="productosAdmin.php">Productos</A></LI>
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="facturasAdmin.php">Realizar Facturas</A></LI>
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="php/cerrarsesion.php">Cerrar sesi&oacute;n</A></LI>
				</UL>
			</DIV>
		</CENTER>
		<HR>
		
		<DIV CLASS="container">
			<CENTER><H2>Productos</H2></CENTER>
			<CENTER><H3>Dar de alta producto</H3></CENTER>
			<CENTER><FORM ID="formInsercion" ACTION="php/insertarProducto.php" METHOD="POST" ONSUBMIT="return validaFormularioInsertar();">
				<DIV CLASS="form-group">
					<LABEL FOR="nombre">Nombre: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="nombre" NAME="nombre" SIZE="30" MAXLENGTH="32" PLACEHOLDER="Nombre" REQUIRED>	
					</DIV>
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="precio">Precio: </LABEL>
					<DIV CLASS="col-sm-9 col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="precio" NAME="precio" SIZE="6" MAXLENGTH="8" PLACEHOLDER="Precio" REQUIRED>
					</DIV>
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="stock">Stock: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="number" ID="stock" NAME="stock" SIZE="2" MAXLENGTH="3" PLACEHOLDER="Stock" REQUIRED>
					</DIV>		
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="categoria">Categor&iacute;a: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<SELECT CLASS="form-control" ID="categoria" NAME="categoria">
							<OPTION>Abarrotes
							<OPTION>Farmacia
							<OPTION>Dulceria
							<OPTION>Lacteos
							<OPTION>Cremeria
							<OPTION>Papeleria
						</SELECT>
					</DIV>
				</DIV>

				<div style="margin-bottom:15px;" class="g-recaptcha" data-sitekey="6LdgquQUAAAAABkxvXbNeIB95SF3OCG_FCdBfKzm"></div>
				<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
					<INPUT CLASS="form-control" TYPE="submit" VALUE="Registrar">
				</DIV>
			</FORM></CENTER>
		</DIV>

		<HR>

		<DIV CLASS="container">
					<CENTER><FORM ONSUBMIT="BuscarProducto();return false;">
					<DIV CLASS="form-group">
						<LABEL FOR="busca">Busca: </LABEL>
						<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
							<INPUT CLASS="form-control" TYPE="text" ID="busca" NAME="busca" SIZE="40" MAXLENGTH="42" PLACEHOLDER="¿Qué deseas buscar?" REQUIRED>
						</DIV>
					</DIV>
					
					<DIV CLASS="form-group">
						<LABEL FOR="criterio">Criterio: </LABEL>
						<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
							<SELECT CLASS="form-control" ID="criterio" NAME="criterio">
								<OPTION>Id
								<OPTION>Nombre
								<OPTION>Precio
								<OPTION>Stock
								<OPTION>Categoria
							</SELECT>
						</DIV>
					</DIV>

					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="submit" VALUE="Buscar">
					</DIV>
				</FORM></CENTER>
			</DIV>

			<CENTER><H2>Tabla de productos</H2></CENTER>
			<CENTER>
				<DIV CLASS="table-responsive">
					<TABLE CLASS="table table-striped table-bordered table-hover">
					
					<TR>
						<TH ALIGN="LEFT">Id</TH>
						<TH>Nombre</TH>
						<TH>Precio</TH>
						<TH>Stock</TH>
						<TH>Categor&iacute;a</TH>
						<TH></TH>
						<TH></TH>
					</TR>

					<?php if($resultado->num_rows>0){?>
						<?php while($row = $resultado->fetch_array()) { ?>
						<TR>
							<TD><?php echo $row['id']; ?></TD>
							<TD><?php echo $row['nombre']; ?></TD>
							<TD><?php echo $row['FORMAT(precio,2)']; ?></TD>
							<TD><?php echo $row['stock']; ?></TD>
							<TD><?php echo $row['categoria']; ?></TD>
							<TD>
								<FORM ID="tformulario" ACTION="modificarProducto.php" METHOD="POST">
									<INPUT TYPE="hidden" ID="idModificar" NAME="idModificar" VALUE="<?php echo $row['id']; ?>">
									<BUTTON>Modificar</BUTTON>
								</FORM>
							</TD>
							<TD>
								<BUTTON id="<?php echo $row['id']; ?>" onclick="eliminaProducto(this.id)">Eliminar</BUTTON>
							</TD>
						</TR>

						<?php } $conexion->close(); ?>
					<?php }else{
						echo "<CENTER><P CLASS="."h6".">No hay productos con esas condiciones de busqueda</P></CENTER>";
						$conexion->close();
					} ?>
				</TABLE>
				</DIV>
			</CENTER>
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

