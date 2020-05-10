<?php
	@session_start();
	include("plantillaFactura.php");
	include("conexion.php");
	$id=$_GET['id'];

	$consultaCli="SELECT * FROM clientes WHERE rfc='".$_SESSION['user']."'";
	$resultadoCli = $conexion->query($consultaCli);

	$consultaFac="SELECT numfactura,DATE_FORMAT(fecha, '%d-%m-%Y') FROM factura WHERE numfactura=".$id."";
	$resultadoFac = $conexion->query($consultaFac);

	$consultaDet="SELECT PRODUCTOS.nombre,FORMAT(PRODUCTOS.precio,2),DETALLE.cantidad,FORMAT(DETALLE.total,2) FROM productos INNER JOIN detalle ON PRODUCTOS.id=DETALLE.idproducto AND DETALLE.numfactura=".$id;
	$resultadoDet = $conexion->query($consultaDet);

	$pdf=new PDF('L','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',12);

	$datosCliente=$resultadoCli->fetch_array();
	$datosFactura=$resultadoFac->fetch_array();
	$pdf->Cell(188,5,utf8_decode($datosCliente['rfc']),0,0,'L',0);
	$pdf->Cell(70,5,"Numero de factura: ".$datosFactura['numfactura'],0,1,'R',0);
	$pdf->Cell(188,5,utf8_decode($datosCliente['nombre'])." ".utf8_decode($datosCliente['apellidop'])." ".utf8_decode($datosCliente['apellidom']),0,0,'L',0);
	$pdf->Cell(70,5,substr($datosFactura["DATE_FORMAT(fecha, '%d-%m-%Y')"], 0, 2)." de ".devolverMes(substr($datosFactura["DATE_FORMAT(fecha, '%d-%m-%Y')"], 3, 2))." de ".substr($datosFactura["DATE_FORMAT(fecha, '%d-%m-%Y')"], 6, 4),0,1,'R',0);
	$pdf->Cell(188,5,utf8_decode($datosCliente['calle']),0,1,'L',0);
	$pdf->Cell(188,5,"#".$datosCliente['numero'],0,1,'L',0);
	$pdf->Cell(188,5,utf8_decode($datosCliente['colonia']),0,1,'L',0);
	$pdf->Cell(188,5,$datosCliente['cp'],0,1,'L',0);
	$pdf->Cell(188,5,"Durango Dgo",0,1,'L',0);
	$pdf->Cell(188,5,"",0,1,'L',0);
	$pdf->Cell(188,5,"",0,1,'L',0);

	$pdf->Cell(108,5,"NOMBRE DEL PRODUCTO",0,0,'L',0);
	$pdf->Cell(50,5,"CANTIDAD",0,0,'L',0);
	$pdf->Cell(50,5,"PRECIO",0,0,'L',0);
	$pdf->Cell(50,5,"TOTAL",0,1,'L',0);
	$pdf->SetFont('Arial','',12);

	$subtotal=0;
	while($filaProducto = $resultadoDet->fetch_array()){
		$pdf->Cell(108,5,utf8_decode($filaProducto['nombre']),0,0,'L',0);
		$pdf->Cell(50,5,$filaProducto['cantidad'],0,0,'L',0);
		$pdf->Cell(50,5,"$".$filaProducto['FORMAT(PRODUCTOS.precio,2)'],0,0,'L',0);
		$pdf->Cell(50,5,"$".$filaProducto['FORMAT(DETALLE.total,2)'],0,1,'L',0);
		$subtotal=$subtotal+$filaProducto['FORMAT(DETALLE.total,2)'];
	}
	$iva=$subtotal*0.16;
	$total=$subtotal+$iva;
	$pdf->Cell(70,5,"",0,1,'L',0);
	$pdf->Cell(158,5,"",0,0,'L',0);
	$pdf->Cell(50,5,"Subtotal",0,0,'L',0);
	$pdf->Cell(50,5,"$".number_format((float)$subtotal, 2, '.', ''),0,1,'L',0);
	$pdf->Cell(158,5,"",0,0,'L',0);
	$pdf->Cell(50,5,"IVA",0,0,'L',0);
	$pdf->Cell(50,5,"$".number_format((float)$iva, 2, '.', ''),0,1,'L',0);
	$pdf->Cell(70,5,"",0,1,'L',0);
	
	$pdf->Cell(158,5,"",0,0,'L',0);
	$pdf->Cell(50,5,"Total",0,0,'L',0);
	$pdf->Cell(50,5,"$".number_format((float)$total, 2, '.', ''),0,1,'L',0);
	$pdf->Output();
	$conexion->close();

	function devolverMes($valor){
		switch ($valor) {
			case '01':
				return 'enero';
				break;
			case '02':
				return 'febrero';
				break;
			case '03':
				return 'marzo';
				break;
			case '04':
				return 'abril';
				break;
			case '05':
				return 'mayo';
				break;
			case '06':
				return 'junio';
				break;
			case '07':
				return 'julio';
				break;
			case '08':
				return 'agosto';
				break;
			case '09':
				return 'septiembre';
				break;
			case '10':
				return 'octubre';
				break;
			case '11':
				return 'noviembre';
				break;
			case '12':
				return 'diciembre';
				break;
		}
	}
?>