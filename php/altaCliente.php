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
			$query1="INSERT INTO clientes VALUES('".$rfc."','".$nombre."','".$apellidoP."','".$apellidoM."','".$calle."','".$numero."','".$colonia."','".$cp."')";
			$resultado1=$conexion->query($query1);

			$query2="INSERT INTO usuarios VALUES('".$rfc."',MD5('".substr($rfc, 0, 10)."'),'CLIENTE')";
			$resultado2=$conexion->query($query2);


			if($resultado1 && $resultado2){
				$regreso='<script>';
				$regreso.='alert("La inserción del cliente fue correcta. Su usuario es '.$rfc.' y su contraseña es '.substr($rfc, 0, 10).'");'; 
				$regreso.='location.href="../clientesAdmin.php";';
				$regreso.='</script>';
			}else{
				$regreso='<script>';
				$regreso.='alert("Hubo error en la inserción del cliente posiblemente el RFC que ingresaste ya esta dentro de la base de datos");'; 
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