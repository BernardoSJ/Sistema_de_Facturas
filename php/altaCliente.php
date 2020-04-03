<?php
	if(!empty($_POST)){
		$rfc = $_POST['rfc'];
		$nombre = $_POST['nombre'];
		$apellidoP = $_POST['apellidoP'];
		$apellidoM = $_POST['apellidoM'];
		$calle = $_POST['calle'];
		$numero = $_POST['numero'];
		$colonia = $_POST['colonia'];
		$cp = $_POST['cp'];

		echo $rfc;

		$captcha = $_POST['g-recaptcha-response'];

		$secret = '6LdgquQUAAAAABIKEhp3yeibNprsAy7HTm5pYIiN';

		if(!$captcha){
			echo "Por favor revisa el captcha";
		}

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		//var_dump($response);

		$arr = json_decode($response,TRUE);
		if($arr['success']){
			echo "El captcha es valido.. iniciando proceso de registro de cliente";
		}else{
			echo "El captcha no es valido";
		}
	}
?>