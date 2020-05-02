<?php
	@session_start();

	$servidor="localhost";
	$usuario=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$BD="facturasmiscelanea";

	$conexion=@mysqli_connect($servidor,$usuario,$password,$BD);
	

?>