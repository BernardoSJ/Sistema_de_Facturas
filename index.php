<?php
	@session_start();
	if(isset($_SESSION['user'])){
		if($_SESSION['tipou']=="ADMINISTRADOR"){
			echo '<script>location.href="indexAdmin.php"; </script>';
		}
		if($_SESSION['tipou']=="CLIENTE"){
			echo '<script>location.href="indexCliente.php"; </script>';
		}
	}
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		
		<TITLE>Sistema de facturas Online</TITLE>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estiloBase.css">
		<LINK REL="STYLESHEET" TYPE="text/css" HREF="css/estilosFormularios.css">

        <script type="text/javascript" src="js/validaLogin.js"></script>
	</HEAD>

	<BODY>
		<HEADER>
			<DIV CLASS="container">
				<CENTER><H1>Sistema de facturas Online</H1></CENTER>
			</DIV>
		</HEADER>
		
		<BR>
		<DIV CLASS="container">
					
					<CENTER><H3>Inicia sesión</H3></CENTER>
						<CENTER><FORM  ACTION="php/validarUsuario.php" METHOD="POST" ONSUBMIT="return validaFormulario();">
							<DIV CLASS="form-group">
								<LABEL FOR="User">RFC: </LABEL>
								<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
									<INPUT CLASS="form-control" TYPE="text" ID="user" NAME="user" SIZE="20" MAXLENGTH="22" PLACEHOLDER="RFC" REQUIRED>
								</DIV>
								
							</DIV>
							
							<DIV CLASS="form-group">
								<LABEL FOR="Pass">Password: </LABEL>
								<DIV CLASS="col-sm-9 col-md-6 col-lg-4">
									<INPUT CLASS="form-control" TYPE="password" ID="pass" NAME="pass" SIZE="20" MAXLENGTH="22" PLACEHOLDER="Password" REQUIRED>
								</DIV>
							</DIV>
							<DIV CLASS="col-sm-9 col-md-6 col-lg-4"> 
								<INPUT CLASS="form-control" TYPE="submit" VALUE="Entrar">
							</DIV>
					</FORM></CENTER>
			
		</DIV>


		<script type="bootstrap/js/jquery.js"></script>
		<script type="bootstrap/js/bootstrap.min.js"></script>
	</BODY>
</HTML>	