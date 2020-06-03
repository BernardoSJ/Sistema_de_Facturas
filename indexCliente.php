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

		<style type="text/css">
			#tformulario{
				width:90%;
				border:1px;
				margin:0px;
			}
		</style>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>

		<script>
			function BuscarFecha(){
				var busqueda,expresionBusca;
				busqueda=document.getElementById("busca").value;
				expresionBusca=/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/;

				if(busqueda==""){
					alert("Debes de llenar el campo de fecha");
				
				}else if(!expresionBusca.test(busqueda)){
					alert("La fecha que escribiste no es valida");
				
				}else{
					 var parametros = {
                		"busca" : busqueda
        			};
					$.ajax({
						url:"indexCliente.php",
						type:"POST",
						data:parametros,
						success: function(response){
							$("BODY").html(response);
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
					<LI CLASS="nav-item"><A CLASS="nav-link" HREF="php/cerrarsesion.php">Cerrar sesi&oacute;n</A></LI>
				</UL>
			</DIV>
		</CENTER>
		<HR>

		<DIV CLASS="container">
			<CENTER>
			<H3>Busca factura(s):</H3>
			<FORM ONSUBMIT="BuscarFecha();return false;">
					<LABEL FOR="busca">Fecha: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="busca" NAME="busca" SIZE="40" MAXLENGTH="42" PLACEHOLDER="DD-MM-YYYY" REQUIRED>
					</DIV>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
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
					<TH></TH>
				</TR>
				<TR>
					<?php if($resultado->num_rows>0){?>
						<?php while($row = $resultado->fetch_array()) { ?>
						<TR>
							<TD><?php echo $row['numfactura']; ?></TD>
							<TD><?php echo $row["DATE_FORMAT(fecha, '%d-%m-%Y')"]; ?></TD>
							<TD>
								<FORM ID="tformulario" ACTION="php/generarFactura.php" METHOD="POST">
									<INPUT TYPE="hidden" ID="idFactura" NAME="idFactura" VALUE="<?php echo $row['numfactura']; ?>">
									<BUTTON>Ver Factura</BUTTON>
								</FORM>	
							</TD>
						</TR>

						<?php } $conexion->close(); ?>
					<?php }else{

						echo "<CENTER><P CLASS="."h6".">No hay facturas con esa fecha</P></CENTER>";
						$conexion->close();
					} ?>
					
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