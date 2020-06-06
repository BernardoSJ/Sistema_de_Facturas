<?php
	if(!empty($_POST)){
		include("php/conexion.php");
		$rfc=$_POST['rfcModificar'];

		$consulta="SELECT * FROM clientes WHERE rfc='$rfc'";
		$resultado=$conexion->query($consulta);
		$respuesta=$resultado->fetch_array();
	}
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<TITLE>Modificar Cliente</TITLE>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloBase.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estilosFormularios.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>

		<script>

			$(document).ready(function(){
 				$("FORM").submit(function(){
   					var response = grecaptcha.getResponse();
      				if(response.length == 0){
          				alert('Por favor chequear la Captcha');
    					return false;}});});
			
			function validaFormularioInsertar(){
				var nombre,apellidoP,apellidoM,calle,numero,colonia,cp,expresionRfc,expresionNumero,expresionCp;
				nombre=document.getElementById("nombre").value.toUpperCase();
				apellidoP=document.getElementById("apellidoP").value.toUpperCase();
				apellidoM=document.getElementById("apellidoM").value.toUpperCase();
				calle=document.getElementById("calle").value.toUpperCase();
				numero=document.getElementById("numero").value;
				colonia=document.getElementById("colonia").value.toUpperCase();
				cp=document.getElementById("cp").value;
				expresionNumero=/^[0-9]{3,4}$/;
				expresionCp=/^[0-9]{5}$/;

				if(nombre=="" || apellidoP=="" || apellidoM=="" || calle=="" || numero=="" || colonia=="" || cp==""){
					alert("Debes de llenar todos los campos");
					return false;
				}else if(nombre.length>30){
					alert("El nombre que ingresaste es muy largo");
					return false;
				}else if (apellidoP.length>30){ 
					alert("El apellido Paterno es muy largo");
					return false;
				}else if(apellidoM.length>30){
					alert("El apellido Materno es muy largo");
					return false;
				}else if(calle.length>30){
					alert("El nombre de la calle es muy largo");
					return false;
				}else if(numero.length>4){
					alert("El número de casa que ingresaste es muy largo");
					return false;
				}else if(!expresionNumero.test(numero)){
					alert("No ingresaste un número de casa valido");
					return false;
				}else if(colonia.length>30){
					alert("El nombre de la colonia es muy largo");
					return false;
				}else if(cp.length>5){
					alert("El CP que ingresaste es muy largo");
					return false;
				}else if(!expresionCp.test(cp)){
					alert("No ingresaste un CP Valido");
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
			<CENTER><H2>Clientes</H2></CENTER>
			<CENTER><H3>Modificar Cliente</H3></CENTER>
			<CENTER><FORM ACTION="php/actualizaCliente.php" METHOD="POST" ONSUBMIT="return validaFormularioInsertar();">
				
				<DIV CLASS="form-group">
					<INPUT TYPE="hidden" ID="rfc" NAME="rfc" VALUE="<?php echo $respuesta['rfc']; ?>">
					<LABEL FOR="nombre">Nombre: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="nombre" NAME="nombre" SIZE="30" MAXLENGTH="32" VALUE="<?php echo $respuesta['nombre']; ?>" PLACEHOLDER="Nombre" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="apellidoP">Apellido Paterno: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="apellidoP" NAME="apellidoP" SIZE="30" MAXLENGTH="32" VALUE="<?php echo $respuesta['apellidop']; ?>" PLACEHOLDER="Apellido Paterno" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="apellidoM">Apellido Materno: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="apellidoM" NAME="apellidoM" SIZE="30" MAXLENGTH="30" VALUE="<?php echo $respuesta['apellidom']; ?>" PLACEHOLDER="Apellido Materno" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="calle">Calle: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="calle" NAME="calle" SIZE="30" MAXLENGTH="32" VALUE="<?php echo $respuesta['calle']; ?>" PLACEHOLDER="Calle" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="numero">N&uacute;mero de Casa: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="numero" NAME="numero" SIZE="4" MAXLENGTH="4" VALUE="<?php echo $respuesta['numero']; ?>" PLACEHOLDER="Número de casa" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="colonia">Colonia: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="colonia" NAME="colonia" SIZE="30" MAXLENGTH="32" VALUE="<?php echo $respuesta['colonia']; ?>" PLACEHOLDER="Colonia" REQUIRED>
					</DIV>
				</DIV>

				<DIV CLASS="form-group">
					<LABEL FOR="cp">CP: </LABEL>
					<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
						<INPUT CLASS="form-control" TYPE="text" ID="cp" NAME="cp" SIZE="30" MAXLENGTH="32" VALUE="<?php echo $respuesta['cp']; ?>" PLACEHOLDER="Código Postal" REQUIRED>
					</DIV>
				</DIV>
				<div style="margin-bottom:15px;" class="g-recaptcha" data-sitekey="6LdgquQUAAAAABkxvXbNeIB95SF3OCG_FCdBfKzm"></div>
				<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
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