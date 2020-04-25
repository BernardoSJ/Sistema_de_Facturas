<?php
	session_start();
	$mysqli=new mysqli("localhost",$_SESSION['user'],$_SESSION['pass'],"pruebafacturas");
	if($mysqli->connect_error){
		die("Error en la conexion " . $mysqli->connect_error);
	}

?>