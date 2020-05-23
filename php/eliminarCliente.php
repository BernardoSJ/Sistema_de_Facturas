<?php
	if(!empty($_POST)){
		include("conexion.php");
		$rfc=$_POST['rfc'];

		$eliminar_Facturas="DELETE FROM factura WHERE rfc = '".$rfc."'";
		$conexion->query($eliminar_Facturas);

		$eliminar_Cliente="DELETE FROM clientes WHERE rfc = '".$rfc."'";
		$conexion->query($eliminar_Cliente);

		$eliminar_Usuario="DELETE FROM usuarios WHERE rfc = '".$rfc."'";
		$conexion->query($eliminar_Usuario);

		$eliminar_Usuario_Servidor="CALL eliminarusuario('".$rfc."')";
		$conexion->query($eliminar_Usuario_Servidor);
		
		echo "Registro eliminado con exito";
		
	
	}
?>