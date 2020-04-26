<?php
	require 'php/conexion.php';
	$condicion="";
	if(!empty($_POST)){
		$busca = $_POST['busca'];
		$criterio = strtolower($_POST['criterio']);

		$condicion = "WHERE $criterio LIKE '%$busca%'";
	}

	$sql = "SELECT idproducto,nombre,FORMAT(precio,2),stock,categoria FROM productos $condicion";

	$resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<TITLE>Admin Productos</TITLE>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloBase.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloMenu.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estilosFormularios.css">

		<script type="text/javascript" src="js/validaPaginaAdminProducto.js"></script>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
 
    

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
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="#">Cerrar sesi&oacute;n</A></LI>
				</UL>
			</DIV>
		</CENTER>
		<HR>
		
		<DIV CLASS="container">
			<CENTER><H2>Productos</H2></CENTER>
			<CENTER><H3>Dar de alta producto</H3></CENTER>
			<CENTER><FORM ACTION="php/altaProducto.php" METHOD="POST" ONSUBMIT="return validaFormularioInsertar();">
				<DIV CLASS="form-group">
					<LABEL FOR="nombre">Nombre: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="nombre" NAME="nombre" SIZE="30" MAXLENGTH="32" REQUIRED>	
					</DIV>
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="precio">Precio: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="precio" NAME="precio" SIZE="6" MAXLENGTH="8" REQUIRED>
					</DIV>
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="stock">Stock: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="number" ID="stock" NAME="stock" SIZE="2" MAXLENGTH="3" REQUIRED>
					</DIV>		
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="categoria">Categor&iacute;a: </LABEL>
					<DIV CLASS="col-lg-4">
						<SELECT CLASS="form-control" ID="categoria" NAME="categoria">
							<OPTION>Abarrotes
							<OPTION>Farmacia
							<OPTION>Dulceria
						</SELECT>
					</DIV>
				</DIV>
				<div style="margin-bottom:15px;" class="g-recaptcha" data-sitekey="6LdgquQUAAAAABkxvXbNeIB95SF3OCG_FCdBfKzm"></div>
				<DIV CLASS="col-lg-4">
					<INPUT CLASS="form-control" TYPE="submit" VALUE="Registrar">
				</DIV>
			</FORM></CENTER>
		</DIV>

		<HR>

		<DIV CLASS="container">
					<CENTER><FORM ACTION="productosAdmin.php" METHOD="POST" ONSUBMIT="return validaFormularioBuscarProducto()">
					<DIV CLASS="form-group">
						<LABEL FOR="busca">Busca: </LABEL>
						<DIV CLASS="col-lg-4">
							<INPUT CLASS="form-control" TYPE="text" ID="busca" NAME="busca" SIZE="40" MAXLENGTH="42" REQUIRED>
						</DIV>
					</DIV>
					
					<DIV CLASS="form-group">
						<LABEL FOR="criterio">Criterio: </LABEL>
						<DIV CLASS="col-lg-4">
							<SELECT CLASS="form-control" ID="criterio" NAME="criterio">
								<OPTION>Id
								<OPTION>Nombre
								<OPTION>Precio
								<OPTION>Stock
								<OPTION>Categoria
							</SELECT>
						</DIV>
					</DIV>

					<DIV CLASS="col-lg-4">
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
						<TH>Modificar</TH>
						<TH>Eliminar</TH>
					</TR>
					<?php while($row = $resultado->fetch_array()) { ?>
					<TR>
						<TD><?php echo $row['idproducto']; ?></TD>
						<TD><?php echo $row['nombre']; ?></TD>
						<TD><?php echo $row['FORMAT(precio,2)']; ?></TD>
						<TD><?php echo $row['stock']; ?></TD>
						<TD><?php echo $row['categoria']; ?></TD>
						<TD><BUTTON>Modificar</BUTTON></TD>
						<TD><BUTTON>Eliminar</BUTTON></TD>
					</TR>

					<?php } $mysqli->close(); ?>
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

