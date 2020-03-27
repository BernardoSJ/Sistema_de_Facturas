<?php

	require_once '../app/init.php';

	$response = $recaptcha->verify($_POST['g-recaptcha-response']);

	if($response->isSuccess()){
		echo "OK funciona";
	}else{
		echo "No funciona";
	}
?>