<?php
	session_start();
	$mysqli=new mysqli("localhost",$_SESSION['user'],$_SESSION['pass'],"facturasmiscelanea");
	if($mysqli->connect_error){
		die("Error en la conexion " . $mysqli->connect_error);
	}

?>