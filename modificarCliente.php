<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<TITLE>Modificar Cliente</TITLE>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloBase.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estilosFormularios.css">
		
	</HEAD>

	<BODY>
		<HEADER>
			<DIV CLASS="container">
				<CENTER><H1>Sistema de facturas Online</H1></CENTER>
			</DIV>
		</HEADER>
		
		
		
		<DIV CLASS="container">
			<CENTER><H2>Clientes</H2></CENTER>
			<CENTER><H3>Modificar Cliente</H3></CENTER>
			<CENTER><FORM ACTION="php/altaCliente.php" METHOD="POST" ONSUBMIT="return validaFormularioInsertar();">
				
				<DIV CLASS="form-group">
					<LABEL FOR="nombre">Nombre: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="nombre" NAME="nombre" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="apellidoP">Apellido Paterno: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="apellidoP" NAME="apellidoP" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="apellidoM">Apellido Materno: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="apellidoM" NAME="apellidoM" SIZE="30" MAXLENGTH="30" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="calle">Calle: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="calle" NAME="calle" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="numero">N&uacute;mero de Casa: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="numero" NAME="numero" SIZE="4" MAXLENGTH="4" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="colonia">Colonia: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="colonia" NAME="colonia" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="cp">CP: </LABEL>
					<DIV CLASS="col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="cp" NAME="cp" SIZE="30" MAXLENGTH="32" REQUIRED>
					</DIV>
				</DIV>
				<div style="margin-bottom:15px;" class="g-recaptcha" data-sitekey="6LdgquQUAAAAABkxvXbNeIB95SF3OCG_FCdBfKzm"></div>
				<DIV CLASS="col-md-6 col-lg-4">
					<INPUT CLASS="form-control btn-captcha" TYPE="submit" VALUE="Registrar">
				</DIV>
				
			</FORM></CENTER>
		</DIV>

		
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