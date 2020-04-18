<?php
	if(!empty($_POST)){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$mysqli=new mysqli("localhost",$user,$pass,"pruebafacturas");
		if($mysqli->connect_error){
				die("Error en la conexion " . $mysqli->connect_error);
		}
		$mysqli->close();
		echo '<script>window.location.replace("../clientesAdmin.php?user='.$user.'&pass='.$pass.'"); </script>';

	}

?>