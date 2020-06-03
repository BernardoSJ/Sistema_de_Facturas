<?php
	ob_start();
    include("../fpdf/fpdf.php");
    ini_set('display_startup_errors',1);
    ini_set('display_errors',1);
    error_reporting(-1);
	class PDF extends FPDF{
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
?>