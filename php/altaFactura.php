<?php
	
	if(!empty($_POST)){
		$rfc = $_POST['rfc'];

		$captcha = $_POST['g-recaptcha-response'];

		$secret = '6LdgquQUAAAAABIKEhp3yeibNprsAy7HTm5pYIiN';

		if(!$captcha){
			echo "Por favor revisa el captcha";
		}

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		//var_dump($response);

		$arr = json_decode($response,TRUE);
		if($arr['success']){
			echo "El captcha es valido... iniciando proceso de registro de factura";
		}else{
			echo "El captcha no es valido";
		}
		$data = json_decode($_POST['caja_valor'], true);
		

		print_r($data);
	}
?>