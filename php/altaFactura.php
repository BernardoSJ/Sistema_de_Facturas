<?php
	
	if(!empty($_POST)){
		$rfc = strtoupper($_POST['rfc']);
		$data = json_decode($_POST['caja_valor'], true);

		$captcha = $_POST['g-recaptcha-response'];

		$secret = '6LdgquQUAAAAABIKEhp3yeibNprsAy7HTm5pYIiN';

		if(!$captcha){
			echo "Por favor revisa el captcha";
		}

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		

		$arr = json_decode($response,TRUE);
		if($arr['success']){
			if(sizeof($data)>0){
				require 'conexion.php';
				$fecha_actual=date('Y')."-".date('m')."-".date('d');
				$query="INSERT INTO factura VALUES('','".$rfc."','".$fecha_actual."')";
				$resultado = $conexion->query($query);
				if($resultado){
					$consultaUltimo="SELECT MAX(numfactura) FROM factura";
					$resultado = $conexion->query($consultaUltimo);
					while($row = $resultado->fetch_array()) {
						$ultimoRegistro=$row[0];
					}

					$iteraciones=sizeof($data)/4;
					$contador=0;
					$pos=0;
					while($contador<$iteraciones){
						//echo $data[$pos]."(id)   ".$data[$pos+2]."(cantidad)   ".$data[$pos+3];
						$query2="INSERT INTO detalle VALUES('',".$ultimoRegistro.",".$data[$pos].",".$data[$pos+2].",".$data[$pos+3].")";
						$resultado2 = $conexion->query($query2);
						if($resultado2){
							$consultaProducto="SELECT stock FROM productos WHERE id=".$data[$pos];
							$resultado = $conexion->query($consultaProducto);
							while($row = $resultado->fetch_array()) {
								$stock=$row[0];
							}
							$nuevaCantidad=$stock-$data[$pos+2];
							$actualiza="UPDATE productos SET stock=".$nuevaCantidad." WHERE id=".$data[$pos];
							$resultadoA = $conexion->query($actualiza);
							
						}else{
							echo $conexion->error;
						}
						$pos=$pos+4;
						$contador=$contador+1;
					}
					$regreso='<script>';
					$regreso.='alert("La factura se genero correctamente");'; 
					$regreso.='location.href="../facturasAdmin.php";';
					$regreso.='</script>';
				}else{
					$regreso='<script>';
					$regreso.='alert("Hubo un error en tu inserción talvez porque el RFC que ingresaste no existe o tienes problemas en tu conexión");'; 
					$regreso.='window.history.back();';
					$regreso.='</script>';
				}
				$conexion->close();
			}else{
				$regreso='<script>';
				$regreso.='alert("No seleccionaste ningún producto para la factura. Revisalo");'; 
				$regreso.='window.history.back();';
				$regreso.='</script>';
			}
		}else{
			$regreso='<script>';
			$regreso.='alert("No resolviste el CAPTCHA. Resuelvelo por favor");'; 
			$regreso.='window.history.back();';
			$regreso.='</script>';
		}
		echo $regreso;
	}
?>