<?php
	require 'php/conexion.php';

	$condicion = "";

	if(!empty($_POST)){
		$busca = $_POST['busca'];
		$criterio = strtolower($_POST['criterio']);

		$condicion = "WHERE $criterio LIKE '%$busca%'";
	}

	$sql = "SELECT * FROM pruebaclientes $condicion";
	$resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<TITLE>Admin Clientes</TITLE>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloBase.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estilosFormularios.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloMenu.css">

		<script type="text/javascript" src="js/validaPaginaAdminCliente.js"></script>
		
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
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="productosAdmin.html">Productos</A></LI>
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="facturasAdmin.html">Realizar Facturas</A></LI>
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="#">Cerrar sesi&oacute;n</A></LI>
				</UL>
			</DIV>
		</CENTER>
		<HR>
		
		<DIV CLASS="container">
			<CENTER><H2>Clientes</H2></CENTER>
			<CENTER><H3>Dar de alta Cliente</H3></CENTER>
			<CENTER><FORM ACTION="php/altaCliente.php" METHOD="POST" ONSUBMIT="return validaFormularioInsertar();">
				<DIV CLASS="form-group">
					<LABEL FOR="rfc">RFC: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="rfc" NAME="rfc" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>
				<DIV CLASS="form-group">
					<LABEL FOR="nombre">Nombre: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="nombre" NAME="nombre" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="apellidoP">Apellido Paterno: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="apellidoP" NAME="apellidoP" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="apellidoM">Apellido Materno: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="apellidoM" NAME="apellidoM" SIZE="30" MAXLENGTH="30" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="calle">Calle: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="calle" NAME="calle" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="numero">N&uacute;mero de Casa: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="numero" NAME="numero" SIZE="4" MAXLENGTH="4" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="colonia">Colonia: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="colonia" NAME="colonia" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="cp">CP: </LABEL>
					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="cp" NAME="cp" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>
				<div style="margin-bottom:15px;" class="g-recaptcha" data-sitekey="6LdgquQUAAAAABkxvXbNeIB95SF3OCG_FCdBfKzm"></div>
				<DIV CLASS="col-lg-4">
					<INPUT CLASS="form-control btn-captcha" TYPE="submit" VALUE="Registrar">
				</DIV>
				
			</FORM></CENTER>
		</DIV>

		<HR>
			<DIV CLASS="container">
					<CENTER><FORM ACTION="clientesAdmin.php" METHOD="POST" ONSUBMIT="return validaFormularioBuscarCliente();">
					<DIV CLASS="form-group">
						<LABEL FOR="busca">Busca: </LABEL>
						<DIV CLASS="col-lg-4">
							<INPUT CLASS="form-control" TYPE="text" ID="busca" NAME="busca" SIZE="30" MAXLENGTH="32" REQUIRED>
						</DIV>
					</DIV>
					
					<DIV CLASS="form-group">
						<LABEL FOR="criterio">Criterio: </LABEL>
						<DIV CLASS="col-lg-4">
							<SELECT CLASS="form-control" ID="criterio" NAME="criterio">
								<OPTION>RFC
								<OPTION>Nombre
								<OPTION>ApellidoP
								<OPTION>ApellidoM
								<OPTION>Calle
								<OPTION>Numero
								<OPTION>Colonia
								<OPTION>CP
							</SELECT>
						</DIV>
					</DIV>

					<DIV CLASS="col-lg-4">
						<INPUT CLASS="form-control" TYPE="submit" VALUE="Buscar">
					</DIV>
				</FORM></CENTER>
			</DIV>
			<CENTER><H2>Tabla de Clientes</H2></CENTER>
			<CENTER>
				<DIV CLASS="table-responsive">
					<TABLE CLASS="table table-striped table-bordered table-hover">
					
					<TR>
						<TH ALIGN="LEFT">RFC</TH>
						<TH>Nombre</TH>
						<TH>Paterno</TH>
						<TH>Materno</TH>
						<TH>Calle</TH>
						<TH>N&uacute;mero</TH>
						<TH>Colonia</TH>
						<TH>CP</TH>
						<TH></TH>
						<TH></TH>
					</TR>
					
					<?php while($row = $resultado->fetch_array()) { ?>
					<TR>
						<TD><?php echo $row['rfc']; ?></TD>
						<TD><?php echo $row['nombre']; ?></TD>
						<TD><?php echo $row['apellidop']; ?></TD>
						<TD><?php echo $row['apellidom']; ?></TD>
						<TD><?php echo $row['calle']; ?></TD>
						<TD><?php echo $row['numero']; ?></TD>
						<TD><?php echo $row['colonia']; ?></TD>
						<TD><?php echo $row['cp']; ?></TD>
						<TD><BUTTON>Modificar</BUTTON></TD>
						<TD><BUTTON>Eliminar</BUTTON></TD>
					</TR>
					<?php } ?>
				</TABLE>
				</DIV>
			</CENTER>
			<FOOTER>
				<DIV CLASS="container">
					<DIV CLASS="container">
						<P CLASS="h6">P&aacute;gina ofrecida para el control de facturas de la Miscelanea </P>
					</DIV>
				</DIV>
			</FOOTER>
			<script type="bootstrap/js/jquery.js"></script>
			<script type="bootstrap/js/bootstrap.min.js"></script>
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</BODY>
</HTML>