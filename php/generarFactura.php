<?php
	
	require '../fpdf/fpdf.php';
	$id=$_GET['id'];

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);

	$pdf->Cell(100,10,$id,1,0,'C');
	$pdf->Output();
?>