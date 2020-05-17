<?php
	@session_start();
	if(!isset($_SESSION['user'])){
		echo '<script>location.href="index.php"; </script>';
	}else if($_SESSION['tipou']=="ADMINISTRADOR"){
		echo '<script>location.href="indexAdmin.php"; </script>';
	}
	include("php/conexion.php");

	$condicion="";
	if(!empty($_POST)){
		$busca = $_POST['busca'];
		$fecha=explode("-",$busca);
		$fecha=$fecha[2]."-".$fecha[1]."-".$fecha[0];
		
		$condicion = "AND fecha='$fecha'";
	}

	$sql = "SELECT numfactura,DATE_FORMAT(fecha, '%d-%m-%Y') FROM factura WHERE rfc='".$_SESSION['user']."' $condicion";

	$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<TITLE>Inicio Clientes</TITLE>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloBase.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloMenu.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estilosFormularios.css">

		<script type="text/javascript" src="js/validaInicioCliente.js"></script>
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
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="php/cerrarsesion.php">Cerrar sesi&oacute;n</A></LI>
				</UL>
			</DIV>
		</CENTER>
		<HR>

		<DIV CLASS="container">
			<CENTER>
			<H3>Busca factura(s):</H3>
			<FORM ACTION="inicioCliente.php" METHOD="POST" ONSUBMIT="return validaFormulario();">
					<LABEL FOR="busca">Fecha: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="busca" NAME="busca" SIZE="40" MAXLENGTH="42" REQUIRED>
					</DIV>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="submit" VALUE="Buscar">
					</DIV>
				</FORM>
			</CENTER>
		</DIV>
		<HR>
		<CENTER>
			<H3>Facturas hechas</H3>
			<DIV CLASS="table-responsive">
				<TABLE CLASS="table table-striped table-bordered table-hover">
				<TR>
					<TH ALIGN="LEFT">Id</TH>
					<TH>Fecha</TH>
					<TH>Ver Factura</TH>
				</TR>
				<TR>
					<?php while($row = $resultado->fetch_array()) { ?>
					<TR>
						<TD><?php echo $row['numfactura']; ?></TD>
						<TD><?php echo $row["DATE_FORMAT(fecha, '%d-%m-%Y')"]; ?></TD>
						<TD><A HREF="php/generarFactura.php?id=<?php echo $row['numfactura']; ?>"><BUTTON>Ver factura</BUTTON></A></TD>	
					</TR>

					<?php } $conexion->close(); ?>
					
				</TR>
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
	</BODY>
</HTML>