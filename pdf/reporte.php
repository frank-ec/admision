<?php

include 'plantilla.php';
//require ('../conexion.php');
require ("../controlDB.php");
$id= $_GET['parametro'];


//$obj = new controlDB();
//$data=$obj->consultar("SELECT * FROM admision_paciente WHERE idPaciente = $id");

$query = "SELECT * from admision_paciente where idPaciente = $id";

$query2 = "SELECT admision_paciente.idPaciente, admision_paciente.idEstadoCivil, estado_civil.idEstadoCivil, estado_civil.estadoCivil from admision_paciente INNER JOIN estado_civil ON  admision_paciente.idEstadoCivil = estado_civil.idEstadoCivil and admision_paciente.idPaciente = $id";

$query3 = "SELECT admision_paciente.idPaciente, admision_paciente.idSeguro, seguro.idSeguro, seguro.nombreSeguro from admision_paciente INNER JOIN seguro ON  admision_paciente.idSeguro = seguro.idSeguro and admision_paciente.idPaciente = $id";

$qCant = "SELECT admision_paciente.idPaciente, admision_paciente.idCanton, canton.idCanton, canton.codCanton, canton.nombreCanton  from admision_paciente INNER JOIN canton ON  admision_paciente.idCanton = canton.idCanton and admision_paciente.idPaciente = $id";

$qParr = "SELECT admision_paciente.idPaciente, admision_paciente.idParroquia, parroquia.idParroquia, parroquia.codParroquia, parroquia.nombreParroquia  from admision_paciente INNER JOIN parroquia ON  admision_paciente.idParroquia = parroquia.idParroquia and admision_paciente.idPaciente = $id";




$resultado = $conexion->query($query);

$resultado2 = $conexion->query($query2);

$resultado3 = $conexion->query($query3);

$resultadoCant = $conexion->query($qCant);

$resultadoParr = $conexion->query($qParr);




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
	
	//Primera fila
	$pdf->cell(10,2,"",0,1,'C');
	$pdf->cell(340,6,utf8_decode($row['cedulaPaciente']),0,1,'C');
	$pdf->cell(10,12,"",0,1,'C');
	
	$pdf->cell(40,6,utf8_decode($row['apePatPaciente']),0,0,'C');
	$pdf->cell(40,6,utf8_decode($row['apeMatPaciente']),0,0,'C');
	$pdf->cell(40,6,utf8_decode($row['primerNombrePaciente']),0,0,'C');
	$pdf->cell(30,6,utf8_decode($row['segundoNombrePaciente']),0,0,'C');
	
	//Número HCli
	$pdf->cell(10,6,"",0,0,'C');
	$pdf->cell(20,6,utf8_decode($row['cedulaPaciente']),0,1,'C');
	$pdf->cell(10,4,"",0,1,'C');
	
	//Segunda Fila
	$pdf->cell(80,6,utf8_decode($row['direccionPaciente']),0,0,'C');



while($rowParr = $resultadoParr->fetch_assoc())

{
	$pdf->cell(40,6,utf8_decode($rowParr['codParroquia']),0,0,'C');

}


	
	

while($rowCant = $resultadoCant->fetch_assoc())
{
	$pdf->cell(5,6,utf8_decode($rowCant['codCanton']),0,0,'C');

}
	
	$pdf->cell(20,6,utf8_decode($row['idProvincia']),0,0,'C');
	$pdf->cell(50,6,utf8_decode($row['telefonoPaciente']),0,1,'C');
	$pdf->cell(10,7,"",0,1,'C');
	
	//Tercera Fila
	$pdf->cell(30,6,utf8_decode($row['fnacPaciente']),0,0,'C');
	$pdf->cell(20,6,utf8_decode($row['lnacPaciente']),0,0,'C');
	$pdf->cell(40,6,utf8_decode($row['nacionalidadPaciente']),0,0,'C');
	$pdf->cell(20,6,utf8_decode($row['gculturalPaciente']),0,0,'C');
	$pdf->cell(15,6,utf8_decode($row['edadPaciente']),0,0,'C');
	$pdf->cell(10,6,utf8_decode($row['sexoPaciente']),0,0,'C');

	while($row2 = $resultado2->fetch_assoc())
{
	$pdf->cell(20,6,utf8_decode($row2['estadoCivil']),0,0,'C');

}	
	
	$pdf->cell(40,6,utf8_decode($row['instruccionPaciente']),0,1,'C');
	$pdf->cell(10,4,"",0,1,'C');
	
	//Cuarta Fila
	$pdf->cell(30,6,utf8_decode($row['fechadmPaciente']),0,0,'C');
	$pdf->cell(20,6,utf8_decode($row['ocupacionPaciente']),0,0,'C');
	$pdf->cell(50,6,utf8_decode($row['empresaPaciente']),0,0,'C');
	
	while($row3 = $resultado3->fetch_assoc())
	{
		$pdf->cell(30,6,utf8_decode($row3['nombreSeguro']),0,0,'C');

	}	


	$pdf->cell(80,6,utf8_decode($row['lugarReferencia']),0,1,'C');
	$pdf->cell(10,3,"",0,1,'C');

	//Quinta Fila
	$pdf->cell(70,6,utf8_decode($row['contactoPaciente']),0,0,'C');
	$pdf->cell(20,6,utf8_decode($row['parentesco']),0,0,'C');
	$pdf->cell(70,6,utf8_decode($row['direccionContacto']),0,0,'C');
	$pdf->cell(20,6,utf8_decode($row['telefonoContacto']),0,0,'C');
	$pdf->cell(10,6,"",0,1,'C');



}


$pdf->Output();




?>
