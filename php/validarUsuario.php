<?php
	if(!empty($_POST)){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$mysqli=new mysqli("localhost",$user,$pass,"facturasmiscelanea");
		if($mysqli->connect_error){
			$solucion='<script>';
			$solucion.='alert("Usuario y/contrasela incorrectos");';
			$solucion.='location.href="../index.php";';
			$solucion.='</script>';
			die($solucion);
		}
		session_start();
		$_SESSION['user']=$user;
		$_SESSION['pass']=$pass;


		$consulta="SELECT tipousuario FROM usuarios WHERE rfc='".$user."'";

		$resultado = $mysqli->query($consulta);
		while($row = $resultado->fetch_array()) {
			$_SESSION['tipou']=$row[0];
		}
		$mysqli->close();
		if($_SESSION['tipou']=="ADMINISTRADOR"){
			echo '<script>location.href="../clientesAdmin.php"; </script>';
		}
		if($_SESSION['tipou']=="CLIENTE"){
			echo '<script>location.href="../inicioCliente.php"; </script>';
		}
		

	}

?>