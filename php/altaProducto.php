<?php

	if(!empty($_POST)){
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$stock = $_POST['stock'];
		$categoria = $_POST['categoria'];

		$captcha = $_POST['g-recaptcha-response'];

		$secret = '6LdgquQUAAAAABIKEhp3yeibNprsAy7HTm5pYIiN';

		if(!$captcha){
			echo "Por favor revisa el captcha";
		}

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		//var_dump($response);

		$arr = json_decode($response,TRUE);
		if($arr['success']){
			echo "El captcha es valido... iniciando proceso de registro de producto";
		}else{
			echo "El captcha no es valido";
		}
	}
?>