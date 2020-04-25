<?php
	if(!empty($_POST)){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$mysqli=new mysqli("localhost",$user,$pass,"pruebafacturas");
		if($mysqli->connect_error){
				die("Error en la conexion " . $mysqli->connect_error);
		}
		session_start();
		$_SESSION['user']=$user;
		$_SESSION['pass']=$pass;
		echo '<script>location.href="../clientesAdmin.php"; </script>';

	}

?>