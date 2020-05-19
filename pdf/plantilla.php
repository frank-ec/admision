<?php
require("fpdf.php");


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	   // Logo
	   //$this->Image('img/logo_pb.png',10,8,33);
	   //Arial bold 15
	   //$this->SetFont('Arial','B',15);
	   // Movernos a la derecha
	   //$this->Cell(55);
	   // Título
	   //$this->Cell(100,12,'Centro de Salud Tabacundo Tipo C',1,0,'C');
	   // Salto de línea
        $this->Ln(5);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}



?>