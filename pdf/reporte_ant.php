<?php

include 'plantilla.php';
require 'conexion.php';
//require "controlDB.php";
$id= $_GET['parametro'];


//$obj = new controlDB();
//$data=$obj->consultar("SELECT * FROM admision_paciente WHERE idPaciente = $id");

$query = "SELECT * from admision_paciente where idPaciente = $id";
$resultado = $conexion->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

/*$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->cell(10,6,'ID',1,0,'C',1);
$pdf->cell(30,6,'CEDULA',1,0,'C',1);
$pdf->cell(60,6,'APELLIDOS',1,0,'C',1);
$pdf->cell(60,6,'NOMBRES',1,1,'C',1);*/


$pdf->SetFont('Arial','',8);
while($row = $resultado->fetch_assoc())
{
	$pdf->cell(10,6,utf8_decode($row['idPaciente']),0,1,'C');
	$pdf->cell(10,6,utf8_decode($row['cedPaciente']),0,1,'C');
	$pdf->cell(10,6,utf8_decode($row['apellidoPaciente']),0,1,'C');
	$pdf->cell(200,6,utf8_decode($row['nombrePaciente']),0,0,'C');
}


$pdf->Output();




?>
