<?php
	if(!empty($_POST)){
		$rfc = strtoupper($_POST['rfc']);
		$nombre = strtoupper($_POST['nombre']);
		$apellidoP = strtoupper($_POST['apellidoP']);
		$apellidoM = strtoupper($_POST['apellidoM']);
		$calle = strtoupper($_POST['calle']);
		$numero = $_POST['numero'];
		$colonia = strtoupper($_POST['colonia']);
		$cp = $_POST['cp'];

		$captcha = $_POST['g-recaptcha-response'];

		$secret = '6LdgquQUAAAAABIKEhp3yeibNprsAy7HTm5pYIiN';

		if(!$captcha){
			echo "Por favor revisa el captcha";
		}

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
		
		$arr = json_decode($response,TRUE);
		if($arr['success']){
			include("conexion.php");
			$query1="UPDATE clientes SET nombre='$nombre',apellidop='$apellidoP',apellidom='$apellidoM',calle='$calle',numero='$numero',colonia='$colonia',cp='$cp' WHERE rfc='$rfc'";
			$resultado1=$conexion->query($query1);

			if($resultado1){
				$regreso='<script>';
				$regreso.='alert("La actualización del cliente fue correcta");'; 
				$regreso.='location.href="../clientesAdmin.php";';
				$regreso.='</script>';
			}else{
				$regreso='<script>';
				$regreso.='alert("Hubo error en la actualización de los datos");'; 
				$regreso.='window.history.back();';
				$regreso.='</script>';
			}
			$conexion->close();
		}else{
			$regreso='<script>';
			$regreso.='alert("No resolviste el CAPTCHA. Resuelvelo por favor");'; 
			$regreso.='window.history.back();';
			$regreso.='</script>';
		}
		echo $regreso;
	}
?>