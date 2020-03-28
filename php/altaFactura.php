<?php

	require_once '../app/init.php';

	$response = $recaptcha->verify($_POST['g-recaptcha-response']);

	if($response->isSuccess()){
		echo "El captcha es valido. Iniciando proceso de registro de Factura..";
	}else{
		echo "No realizaste el captcha. Por favor vuelve a intentarlo";
	}
?>