<?php
	if(!empty($_POST)){
		session_start();
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		$_SESSION['user']=$user;
		$_SESSION['pass']=$pass;

		include("conexion.php");

		if(!$conexion){
			$funcion='<script>';
			$funcion.='alert("No se pudo realizar la conexión con la base de datos");';
			$funcion.='location.href="../index.php";';
			$funcion.='</script>';
			session_destroy();
			die($funcion);
		}else{
			$consulta="SELECT tipousuario FROM usuarios WHERE rfc='".$user."' AND pass=MD5('".$pass."')";

			$resultado = $conexion->query($consulta);
			if($resultado->num_rows>0){
				$usu=$resultado->fetch_array();
				$_SESSION['tipou']=$usu['tipousuario'];
			
				$conexion->close();
				if($_SESSION['tipou']=="ADMINISTRADOR"){
					echo '<script>location.href="../indexAdmin.php"; </script>';
				}
				if($_SESSION['tipou']=="CLIENTE"){
					echo '<script>location.href="../indexCliente.php"; </script>';
				}
			}else{
				$funcion='<script>';
				$funcion.='alert("Usuario y/o contraseña incorrectos");';
				$funcion.='location.href="../index.php";';
				$funcion.='</script>';
				session_destroy();
				die($funcion);
			}
			
		}
		
		

	}

?>