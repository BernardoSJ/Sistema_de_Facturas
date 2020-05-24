<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<TITLE>Admin Productos</TITLE>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloBase.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estilosFormularios.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
 

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
			<CENTER><FORM ACTION="php/insertarProducto.php" METHOD="POST" ONSUBMIT="return validaFormularioInsertar();">
				<DIV CLASS="form-group">
					<LABEL FOR="nombre">Nombre: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="nombre" NAME="nombre" SIZE="30" MAXLENGTH="32" REQUIRED>	
					</DIV>
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="precio">Precio: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="precio" NAME="precio" SIZE="6" MAXLENGTH="8" REQUIRED>
					</DIV>
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="stock">Stock: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="number" ID="stock" NAME="stock" SIZE="2" MAXLENGTH="3" REQUIRED>
					</DIV>		
				</DIV>
				
				<DIV CLASS="form-group">
					<LABEL FOR="categoria">Categor&iacute;a: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
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
				<DIV CLASS="col-md-6 col-lg-4">
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

