<?php
	if(!empty($_POST)){
		$nombre = strtoupper($_POST['nombre']);
		$precio = $_POST['precio'];
		$stock = $_POST['stock'];
		$categoria = strtoupper($_POST['categoria']);

		$captcha = $_POST['g-recaptcha-response'];

		$secret = '6LdgquQUAAAAABIKEhp3yeibNprsAy7HTm5pYIiN';

		

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		

		$arr = json_decode($response,TRUE);
		if($arr['success']){
			include("conexion.php");
			$query="INSERT INTO productos VALUES('','".$nombre."',".$precio.",".$stock.",'".$categoria."')";

			$resultado=$conexion->query($query);
			if($resultado){
				$regreso='<script>';
				$regreso.='alert("La inserción del producto fue correcta");'; 
				$regreso.='location.href="../productosAdmin.php";';
				$regreso.='</script>';
			}else{
				$regreso='<script>';
				$regreso.='alert("Hubo error en la inserción");'; 
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