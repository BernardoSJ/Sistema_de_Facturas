<?php
	if(!empty($_POST)){
		include("conexion.php");
		$id=$_POST['id'];

		$eliminar_Detalles="DELETE FROM detalle WHERE idproducto = ".$id."";
		$conexion->query($eliminar_Detalles);

		$eliminar_Producto="DELETE FROM productos WHERE id = ".$id."";
		$conexion->query($eliminar_Producto);

		echo "Producto eliminado con exito";
	}
?>