<?php


include 'plantilla.php';
//require ('../conexion.php');
require ("../controlDB.php");
$id= $_GET['parametro'];

//$obj = new controlDB();
//$data=$obj->consultar("SELECT * FROM admision_paciente WHERE idPaciente = $id");

$query = "SELECT admision_paciente.*, atencion_emergencia.* from admision_paciente INNER JOIN atencion_emergencia ON admision_paciente.idPaciente = atencion_emergencia.idPaciente  where atencion_emergencia.frm_08 = $id";

$query2 = "SELECT admision_paciente.idPaciente, admision_paciente.idEstadoCivil, estado_civil.idEstadoCivil, estado_civil.estadoCivil from admision_paciente INNER JOIN estado_civil ON  admision_paciente.idEstadoCivil = estado_civil.idEstadoCivil and admision_paciente.idPaciente = $id";

$query3 = "SELECT admision_paciente.idPaciente, admision_paciente.idSeguro, seguro.idSeguro, seguro.nombreSeguro from admision_paciente INNER JOIN seguro ON  admision_paciente.idSeguro = seguro.idSeguro and admision_paciente.idPaciente = $id";

$qCant = "SELECT admision_paciente.idPaciente, admision_paciente.idCanton, canton.idCanton, canton.codCanton, canton.nombreCanton  from admision_paciente INNER JOIN canton ON  admision_paciente.idCanton = canton.idCanton and admision_paciente.idPaciente = $id";

$qParr = "SELECT admision_paciente.idPaciente, admision_paciente.idParroquia, parroquia.idParroquia, parroquia.codParroquia, parroquia.nombreParroquia  from admision_paciente INNER JOIN parroquia ON  admision_paciente.idParroquia = parroquia.idParroquia and admision_paciente.idPaciente = $id";

$qCie10 = "SELECT atencion_emergencia.cie_ingreso, cie_10.idCie10, cie_10.codigo_cie10, cie_10.patologia_cie10 from atencion_emergencia INNER JOIN cie_10 ON atencion_emergencia.cie_ingreso = cie_10.idCie10 and atencion_emergencia.frm_08 = $id";

$qCie102 = "SELECT atencion_emergencia.cie_alta, cie_10.idCie10, cie_10.codigo_cie10, cie_10.patologia_cie10 from atencion_emergencia INNER JOIN cie_10 ON atencion_emergencia.cie_alta = cie_10.idCie10 and atencion_emergencia.frm_08 = $id";

$qMed_1 = "SELECT atencion_emergencia.medicamento_1, atencion_emergencia.posologia_medicamento_1, medicamentos.id_medicamento, medicamentos.nombre_medicamento from atencion_emergencia INNER JOIN medicamentos ON atencion_emergencia.medicamento_1 = medicamentos.id_medicamento and atencion_emergencia.frm_08=$id";


$sqlCerrado="UPDATE atencion_emergencia SET estado = '$CERRADO',  WHERE frm_08 ='$id'";






$resultado = $conexion->query($query);

$resultado2 = $conexion->query($query2);

$resultado3 = $conexion->query($query3);

$resultadoCant = $conexion->query($qCant);

$resultadoParr = $conexion->query($qParr);

$resultadoCie10 = $conexion->query($qCie10);

$resultadoCie102 = $conexion->query($qCie102);

$resultadoMed_1 = $conexion->query($qMed_1);

$resultadoCerrado = $conexion->query($sqlCerrado);






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

	$conexion=mysql_connect("localhost","root","tabacundocst2018") or die("problema con el servidor");
	mysql_select_db("ADMISION",$conexion) or die ("no selecciona la base de datos"); 

	$consulta = mysql_query("UPDATE atencion_emergencia SET  estado= 'IMPRESO' WHERE frm_08 ='$id'",$conexion);
	//Primera fila
	$pdf->cell(10,4,"",0,1,'C');
	$pdf->cell(20,8,utf8_decode($row['frm_08']),0,0,'C');
	$pdf->cell(330,8,utf8_decode($row['cedulaPaciente']),0,1,'C');
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
	$pdf->cell(30,6,utf8_decode($row['direccionPaciente']),0,0,'C');
	$pdf->cell(106,6,utf8_decode($row['barrioPaciente']),0,0,'C');



while($rowParr = $resultadoParr->fetch_assoc())

{
	$pdf->cell(5,6,utf8_decode($rowParr['nombreParroquia']),0,0,'C');

}


while($rowCant = $resultadoCant->fetch_assoc())
{
	$pdf->cell(5,6,utf8_decode($rowCant['idCanton']),0,0,'C');

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
	$pdf->cell(25,6,utf8_decode($row['sexoPaciente']),0,0,'C');

	while($row2 = $resultado2->fetch_assoc())
{
	$pdf->cell(10,6,utf8_decode($row2['estadoCivil']),0,0,'C');

}	
	
	$pdf->cell(50,6,utf8_decode($row['instruccionPaciente']),0,1,'C');
	$pdf->cell(10,4,"",0,1,'C');
	
	//Cuarta Fila
	$pdf->cell(20,6,utf8_decode($row['fechadmPaciente']),0,0,'C');
	$pdf->cell(30,6,utf8_decode($row['ocupacionPaciente']),0,0,'C');
	$pdf->cell(50,6,utf8_decode($row['empresaPaciente']),0,0,'C');
	
	while($row3 = $resultado3->fetch_assoc())
	{
		$pdf->cell(30,6,utf8_decode($row3['nombreSeguro']),0,0,'C');

	}	


	$pdf->cell(80,6,utf8_decode($row['lugarReferencia']),0,1,'C');
	$pdf->cell(10,3,"",0,1,'C');

	//Quinta Fila
	$pdf->cell(60,6,utf8_decode($row['contactoPaciente']),0,0,'C');
	$pdf->cell(20,6,utf8_decode($row['parentesco']),0,0,'C');
	$pdf->cell(70,6,utf8_decode($row['direccionContacto']),0,0,'C');
	$pdf->cell(40,6,utf8_decode($row['telefonoContacto']),0,0,'C');
	$pdf->cell(10,6,"",0,1,'C');

	//Sexta Fila
	$pdf->cell(40,16,utf8_decode($row['forma_llegada']),0,0,'C');
	$pdf->cell(60,16,utf8_decode($row['fuente_informacion']),0,0,'C');
	$pdf->cell(30,16,utf8_decode($row['institucion_entrega']),0,0,'C');
	$pdf->cell(80,16,utf8_decode($row['telefono_entrega']),0,0,'C');
	$pdf->cell(10,6,"",0,1,'C');

	
	$pdf->cell(1,10,"",0,1,'C');
	

	$pdf->cell(42,12,utf8_decode($row['hora_inicio']),0,1,'C');
	$pdf->cell(130,2,utf8_decode($row['motivo_atencion']),0,0,'C');
	$pdf->cell(1,2,utf8_decode($row['otro_motivo']),0,0,'C');
	$pdf->cell(105,2,utf8_decode($row['grupo_sanguineo']),0,0,'C');
	$pdf->cell(10,2,"",0,1,'C');


	//Octava Fila
	
	$pdf->cell(1,8,"",0,1,'C');
	$pdf->SetFont('Arial','',6);

	$pdf->cell(50,2,utf8_decode($row['fecha_evento']),0,0,'C');
	$pdf->cell(-28,2,utf8_decode($row['hora_evento']),0,0,'C');
	
	$pdf->cell(90,4,utf8_decode($row['lugar_evento']),0,0,'C');
	$pdf->cell(10,4,utf8_decode($row['direccion_evento']),0,0,'C');
	$pdf->cell(130,4,utf8_decode($row['custodia_policial']),0,1,'C');

	
	$pdf->cell(1,6,"",0,1,'C');
	$pdf->SetFont('Arial','',8);
    
	if ($row['accidente_transito'] == '1')
    {
    $pdf->cell(40,0,utf8_decode('X'),0,0,'C');
	}
	else
	{
	$pdf->cell(40,1,utf8_decode('--'),0,0,'C');
	}

	if ($row['caida'] == '1')
    {
    $pdf->cell(8,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,1,utf8_decode('--'),0,0,'C');
	}

	if ($row['quemadura'] == '1')
    {
    $pdf->cell(40,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(40,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['mordedura'] == '1')
    {
    $pdf->cell(8,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['ahogamiento'] == '1')
    {
    $pdf->cell(38,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(38,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['cuerpo_ext'] == '1')
    {
    $pdf->cell(10,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(10,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['aplastamiento'] == '1')
    {
    $pdf->cell(36,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(36,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['otro_accidente'] == '1')
    {
    $pdf->cell(16,1,utf8_decode('X'),0,1,'C');
    }
	else
	{
	$pdf->cell(16,1,utf8_decode('--'),0,1,'C');
	}


	//SEGUNDA FILA
	if ($row['arma_fuego'] == '1')
    {
    $pdf->cell(40,10,utf8_decode('X'),0,0,'C');
	}
	else
	{
	$pdf->cell(40,10,utf8_decode('--'),0,0,'C');
	}

	if ($row['c_punzante'] == '1')
    {
    $pdf->cell(8,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,10,utf8_decode('--'),0,0,'C');
	}

	if ($row['rina'] == '1')
    {
    $pdf->cell(40,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(40,10,utf8_decode('--'),0,0,'C');
	}


	if ($row['violencia_familiar'] == '1')
    {
    $pdf->cell(8,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,10,utf8_decode('--'),0,0,'C');
	}

	if ($row['abuso_fisico'] == '1')
    {
    $pdf->cell(38,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(38,10,utf8_decode('--'),0,0,'C');
	}


	if ($row['abuso_psico'] == '1')
    {
    $pdf->cell(10,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(10,10,utf8_decode('--'),0,0,'C');
	}


	if ($row['abuso_sexual'] == '1')
    {
    $pdf->cell(36,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(36,10,utf8_decode('--'),0,0,'C');
	}


	if ($row['otra_violencia'] == '1')
    {
    $pdf->cell(16,10,utf8_decode('X'),0,1,'C');
    }
	else
	{
	$pdf->cell(16,10,utf8_decode('--'),0,1,'C');
	}


	//TERCERA FILA
	if ($row['int_alcoholica'] == '1')
    {
    $pdf->cell(40,2,utf8_decode('X'),0,0,'C');
	}
	else
	{
	$pdf->cell(40,2,utf8_decode('--'),0,0,'C');
	}


	if ($row['int_alimenticia'] == '1')
    {
    $pdf->cell(8,2,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,2,utf8_decode('--'),0,0,'C');
	}


	if ($row['int_drogas'] == '1')
    {
    $pdf->cell(40,2,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(40,2,utf8_decode('--'),0,0,'C');
	}


	if ($row['inhalacion_gases'] == '1')
    {
    $pdf->cell(8,2,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,2,utf8_decode('--'),0,0,'C');
	}


	if ($row['otra_intoxicacion'] == '1')
    {
    $pdf->cell(38,2,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(38,2,utf8_decode('--'),0,0,'C');
	}


	if ($row['envenenamiento'] == '1')
    {
    $pdf->cell(10,2,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(10,2,utf8_decode('--'),0,0,'C');
	}


	if ($row['picadura'] == '1')
    {
    $pdf->cell(36,2,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(36,2,utf8_decode('--'),0,0,'C');
	}


	if ($row['anafilaxia'] == '1')
    {
    $pdf->cell(16,2,utf8_decode('X'),0,1,'C');
    }
	else
	{
	$pdf->cell(16,2,utf8_decode('--'),0,1,'C');
	}



$pdf->cell(55,22,utf8_decode($row['observaciones']),0,1,'C');




$pdf->cell(1,10,"",0,1,'C');
/*	$pdf->SetFont('Arial','',6);

//PRIMERA FILA

if ($row['accidente_transito'] == '1')
    {
    $pdf->cell(35,6,utf8_decode('ACCIDENTE DE TRANSITO'),1,0,'C');
	
    }
else
{
$pdf->cell(35,6,utf8_decode(''),1,0,'C');
}

if ($row['caida'] == '1')
    {
    $pdf->cell(18,6,utf8_decode('CAIDA'),1,0,'C');
    }
else
{
$pdf->cell(18,6,utf8_decode(''),1,0,'C');
}

if ($row['quemadura'] == '1')
    {
    $pdf->cell(20,6,utf8_decode('QUEMADURA'),1,0,'C');
    }
else
{
$pdf->cell(20,6,utf8_decode(''),1,0,'C');
}

if ($row['mordedura'] == '1')
    {
    $pdf->cell(25,6,utf8_decode('MORDEDURA'),1,0,'C');
    }
else
{
$pdf->cell(25,6,utf8_decode(''),1,0,'C');
}

if ($row['ahogamiento'] == '1')
    {
    $pdf->cell(20,6,utf8_decode('AHOGAMIENTO'),1,0,'C');
    }
else
{
$pdf->cell(20,6,utf8_decode(''),1,0,'C');
}

if ($row['cuerpo_ext'] == '1')
    {
    $pdf->cell(30,6,utf8_decode('CUERPO EXTRAÑO'),1,'C');
    }
else
{
$pdf->cell(30,6,utf8_decode(''),1,0,'C');
}

if ($row['aplastamiento'] == '1')
    {
    $pdf->cell(22,6,utf8_decode('APLASTAMIENTO'),1,0,'C');
    }
else
{
$pdf->cell(22,6,utf8_decode(''),1,0,'C');
}

if ($row['otro_accidente'] == '1')
    {
    $pdf->cell(25,6,utf8_decode('OTRO ACCIDENTE'),1,1,'C');
    }
else
{
$pdf->cell(25,6,utf8_decode(''),1,1,'C');
}

//SEGUNDA FILA

if ($row['arma_fuego'] == '1')
    {
    $pdf->cell(30,6,utf8_decode('V. X ARMA DE FUEGO'),1,0,'C');
    }
else
{
$pdf->cell(30,6,utf8_decode(''),1,0,'C');
}


if ($row['c_punzante'] == '1')
    {
    $pdf->cell(30,6,utf8_decode('V. X ARMA C.PUNZANTE'),1,0,'C');
    }
else
{
$pdf->cell(30,6,utf8_decode(''),1,0,'C');
}

if ($row['rina'] == '1')
    {
    $pdf->cell(20,6,utf8_decode('V. X RIÑA'),1,0,'C');
    }
else
{
$pdf->cell(20,6,utf8_decode(''),1,0,'C');
}
	
if ($row['violencia_familiar'] == '1')
    {
    $pdf->cell(20,6,utf8_decode('V. FAMILIAR'),1,0,'C');
    }
else
{
$pdf->cell(20,6,utf8_decode(''),1,0,'C');
}

if ($row['abuso_fisico'] == '1')
    {
    $pdf->cell(20,6,utf8_decode('ABUSO FÍSICO'),1,0,'C');
    }
else
{
$pdf->cell(20,6,utf8_decode(''),1,0,'C');
}

if ($row['abuso_psico'] == '1')
    {
    $pdf->cell(25,6, utf8_decode('ABUSO PSICOLÓGICO'),1,0,'C');
    }
else
{
$pdf->cell(25,6,utf8_decode(''),1,0,'C');
}


if ($row['abuso_sexual'] == '1')
    {
    $pdf->cell(25,6,utf8_decode('ABUSO SEXUAL'),1,0,'C');
    }
else
{
$pdf->cell(25,6,utf8_decode(''),1,0,'C');
}

if ($row['otra_violencia'] == '1')
    {
    $pdf->cell(25,6,utf8_decode('OTRA VIOLENCIA'),1,1,'C');
    }
else
{
$pdf->cell(25,6,utf8_decode(''),1,1,'C');
}

//TERCERA FILA

if ($row['int_alcoholica'] == '1')
    {
    $pdf->cell(30,6,utf8_decode('INT. ALCOHOLICA'),1,0,'C');
    }
else
{
$pdf->cell(30,6,utf8_decode(''),1,0,'C');
}


if ($row['int_alimenticia'] == '1')
    {
    $pdf->cell(25,6,utf8_decode('INT. ALIMENTICIA'),1,0,'C');
    }
else
{
$pdf->cell(25,6,utf8_decode(''),1,0,'C');
}

if ($row['int_drogas'] == '1')
    {
    $pdf->cell(20,6,utf8_decode('INT. X DROGAS'),1,0,'C');
    }
else
{
$pdf->cell(20,6,utf8_decode(''),1,0,'C');
}
	
if ($row['inhalacion_gases'] == '1')
    {
    $pdf->cell(25,6,utf8_decode('INAHALACION GASES'),1,0,'C');
    }
else
{
$pdf->cell(25,6,utf8_decode(''),1,0,'C');
}

if ($row['otra_intoxicacion'] == '1')
    {
    $pdf->cell(25,6,utf8_decode('OTRA INTOXICACION'),1,0,'C');
    }
else
{
$pdf->cell(25,6,utf8_decode(''),1,0,'C');
}

if ($row['envenenamiento'] == '1')
    {
    $pdf->cell(22,6, utf8_decode('ENVENENAMIENTO'),1,0,'C');
    }
else
{
$pdf->cell(22,6,utf8_decode(''),1,0,'C');
}


if ($row['picadura'] == '1')
    {
    $pdf->cell(20,6,utf8_decode('PICADURA'),1,0,'C');
    }
else
{
$pdf->cell(20,6,utf8_decode(''),1,0,'C');
}

if ($row['anafilaxia'] == '1')
    {
    $pdf->cell(28,6,utf8_decode('ANAFILAXIA'),1,1,'C');
    }
else
{
$pdf->cell(28,6,utf8_decode(''),1,1,'C');
}

*/

	$pdf->cell(1,1,"",0,1,'C');
$pdf->cell(158,6,utf8_decode($row['']),0,0,'C');
$pdf->cell(5,8,utf8_decode($row['aliento_etilico']),0,0,'C');
$pdf->cell(50,8,utf8_decode($row['valor_alcocheck']),0,0,'C');



//ANTECEDENTES PERSONALES Y FAMILIARES

$pdf->cell(1,6,"",0,1,'C');	
	if ($row['alergico'] == '1')
    {
    $pdf->cell(40,22,utf8_decode('X'),0,0,'C');
	}
	else
	{
	$pdf->cell(40,22,utf8_decode('--'),0,0,'C');
	}

	if ($row['clinico'] == '1')
    {
    $pdf->cell(8,22,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,22,utf8_decode('--'),0,0,'C');
	}

	if ($row['ginecologico'] == '1')
    {
    $pdf->cell(40,22,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(40,22,utf8_decode('--'),0,0,'C');
	}


	if ($row['traumatologico'] == '1')
    {
    $pdf->cell(10,22,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(10,22,utf8_decode('--'),0,0,'C');
	}


	if ($row['quirurgico'] == '1')
    {
    $pdf->cell(34,22,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(34,22,utf8_decode('--'),0,0,'C');
	}


	if ($row['farmacologico'] == '1')
    {
    $pdf->cell(14,22,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(14,22,utf8_decode('--'),0,0,'C');
	}


	if ($row['psiquiatrico'] == '1')
    {
    $pdf->cell(32,22,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(32,22,utf8_decode('--'),0,0,'C');
	}


	if ($row['otro_antecedente'] == '1')
    {
    $pdf->cell(22,22,utf8_decode('X'),0,1,'C');
    }
	else
	{
	$pdf->cell(22,22,utf8_decode('--'),0,1,'C');
	}

$pdf->SetFont('Arial','',8);
$pdf->cell(80,0,utf8_decode($row['antecedente']),0,1,'C');

/*	//CUADRO DE CONTROL
	//PRIMERA FILA
$pdf->SetFont('Arial','',7);
if ($row['alergico'] == '1')
    {
    $pdf->cell(20,6,utf8_decode('ALÉRGICO'),1,0,'C');
	
    }
else
{
$pdf->cell(20,6,utf8_decode(''),1,0,'C');
}

if ($row['clinico'] == '1')
    {
    $pdf->cell(20,6,utf8_decode('CLÍNICO'),1,0,'C');
    }
else
{
$pdf->cell(20,6,utf8_decode(''),1,0,'C');
}

if ($row['ginecologico'] == '1')
    {
    $pdf->cell(30,6,utf8_decode('GINECOLÓGICO'),1,0,'C');
    }
else
{
$pdf->cell(30,6,utf8_decode(''),1,0,'C');
}

if ($row['traumatologico'] == '1')
    {
    $pdf->cell(30,6,utf8_decode('TRAUMATOLÓGICO'),1,0,'C');
    }
else
{
$pdf->cell(30,6,utf8_decode(''),1,0,'C');
}

if ($row['quirurgico'] == '1')
    {
    $pdf->cell(20,6,utf8_decode('QUIRÚRGICO'),1,0,'C');
    }
else
{
$pdf->cell(20,6,utf8_decode(''),1,0,'C');
}

if ($row['farmacologico'] == '1')
    {
    $pdf->cell(24,6,utf8_decode('FARMACOLÓGICO'),1,'C');
    }
else
{
$pdf->cell(24,6,utf8_decode(''),1,0,'C');
}

if ($row['psiquiatrico'] == '1')
    {
    $pdf->cell(22,6,utf8_decode('PSIQUIÁTRICO'),1,0,'C');
    }
else
{
$pdf->cell(22,6,utf8_decode(''),1,0,'C');
}

if ($row['otro_antecedente'] == '1')
    {
    $pdf->cell(28,6,utf8_decode('OTRO ANTECEDENTE'),1,1,'C');
    }
else
{
$pdf->cell(28,6,utf8_decode(''),1,1,'C');
}

*/
//ENFERMEDAD ACTUAL Y REVISION DE SISTEMAS
//PRIMERA FILA

$pdf->cell(1,16,"",0,1,'C');
	if ($row['via_aerea_libre'] == '1')
    {
    $pdf->cell(54,28,utf8_decode('X'),0,0,'C');
	}
	else
	{
	$pdf->cell(54,28,utf8_decode('--'),0,0,'C');
	}

	if ($row['via_aerea_obstruida'] == '1')
    {
    $pdf->cell(8,28,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,28,utf8_decode('--'),0,0,'C');
	}

	if ($row['condicion_estable'] == '1')
    {
    $pdf->cell(46,28,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(46,28,utf8_decode('--'),0,0,'C');
	}


	if ($row['condicion_inestable'] == '1')
    {
    $pdf->cell(15,28,utf8_decode('X'),0,1,'C');
    }
	else
	{
	$pdf->cell(15,28,utf8_decode('--'),0,1,'C');
	}

	$pdf->SetFont('Arial','',8);
$pdf->cell(80,0,utf8_decode($row['enfermedad_actual']),0,1,'C');

/*//CUADRO DE CONTROL
	//PRIMERA FILA
$pdf->SetFont('Arial','',7);
if ($row['via_aerea_libre'] == '1')
    {
    $pdf->cell(40,6,utf8_decode('VÍUA AÉREA LIBRE'),1,0,'C');
	
    }
else
{
$pdf->cell(40,6,utf8_decode(''),1,0,'C');
}

if ($row['via_aerea_obstruida'] == '1')
    {
    $pdf->cell(40,6,utf8_decode('VÍA AÉREA OBSTRUIDA'),1,0,'C');
    }
else
{
$pdf->cell(40,6,utf8_decode(''),1,0,'C');
}

if ($row['condicion_estable'] == '1')
    {
    $pdf->cell(30,6,utf8_decode('CONDICIÓN ESTABLE'),1,0,'C');
    }
else
{
$pdf->cell(30,6,utf8_decode(''),1,0,'C');
}

if ($row['condicion_inestable'] == '1')
    {
    $pdf->cell(30,6,utf8_decode('CONDICIÓN INESTABLE'),1,0,'C');
    }
else
{
$pdf->cell(30,6,utf8_decode(''),1,0,'C');
}

*/



$pdf->AddPage();

$pdf->cell(10,2,"",0,0,'C');
	$pdf->cell(38,10,utf8_decode($row['presion_arterial_sis'].'/'.$row['presion_arterial_dia'].' mmHg'),0,0,'');
	$pdf->cell(28,10,utf8_decode($row['frecuencia_cardiaca']),0,0,'');
	$pdf->cell(25,10,utf8_decode($row['frecuencia_respiratoria']),0,0,'');
	$pdf->cell(25,10,utf8_decode($row['temperatura_bucal']),0,0,'');
	$pdf->cell(26,10,utf8_decode($row['temperatura_axilar']),0,0,'');
	$pdf->cell(26,10,utf8_decode($row['peso']),0,0,'');
	$pdf->cell(10,10,utf8_decode($row['talla']),0,0,'');
	$pdf->cell(10,10,"",0,1,'C');


	$pdf->cell(30,1,"",0,0,'C');
	$pdf->cell(20,2,utf8_decode($row['gw_ocular']),0,0,'');
	$pdf->cell(22,2,utf8_decode($row['gw_verbal']),0,0,'');
	$pdf->cell(22,4,utf8_decode($row['gw_motora']),0,0,'');
	$pdf->cell(20,4,utf8_decode($row['gw_total']),0,0,'');
	$pdf->cell(24,4,utf8_decode($row['reaccion_pup_der']),0,0,'');
	$pdf->cell(18,4,utf8_decode($row['reaccion_pup_izq']),0,0,'');
	$pdf->cell(22,4,utf8_decode($row['t_llen_capilar']),0,0,'');
	$pdf->cell(20,4,utf8_decode($row['satura_oxigeno']),0,0,'');
	$pdf->cell(10,0,"",0,1,'C');
	


//EXAMEN FISICO Y DIAGNOSTICO
$pdf->cell(1,3,"",0,1,'C');
	if ($row['d_via_aerea_obstruida'] == '1')
    {
    $pdf->cell(36,20,utf8_decode('X'),0,0,'C');
	}
	else
	{
	$pdf->cell(36,20,utf8_decode('--'),0,0,'C');
	}

	if ($row['cabeza'] == '1')
    {
    $pdf->cell(8,20,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,20,utf8_decode('--'),0,0,'C');
	}

	if ($row['cuello'] == '1')
    {
    $pdf->cell(40,20,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(40,20,utf8_decode('--'),0,0,'C');
	}


	if ($row['torax'] == '1')
    {
    $pdf->cell(10,20,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(10,20,utf8_decode('--'),0,0,'C');
	}


	if ($row['abdomen'] == '1')
    {
    $pdf->cell(34,20,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(34,20,utf8_decode('--'),0,0,'C');
	}


	if ($row['columna'] == '1')
    {
    $pdf->cell(14,20,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(14,20,utf8_decode('--'),0,0,'C');
	}


	if ($row['pelvis'] == '1')
    {
    $pdf->cell(32,20,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(32,20,utf8_decode('--'),0,0,'C');
	}


	if ($row['extremidad'] == '1')
    {
    $pdf->cell(22,20,utf8_decode('X'),0,1,'C');
    }
	else
	{
	$pdf->cell(22,20,utf8_decode('--'),0,1,'C');
	}

$pdf->SetFont('Arial','',8);
$pdf->cell(80,0,utf8_decode($row['examen_fisico_diagnostico']),0,1,'C');




//SOLICITUD DE EXAMENES
$pdf->cell(1,138,"",0,1,'C');
	$pdf->SetFont('Arial','',8);
    
	if ($row['biometria'] == '1')
    {
    $pdf->cell(38,0,utf8_decode('X'),0,0,'C');
	}
	else
	{
	$pdf->cell(38,1,utf8_decode('--'),0,0,'C');
	}

	if ($row['quimica_sanguinea'] == '1')
    {
    $pdf->cell(8,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,1,utf8_decode('--'),0,0,'C');
	}

	if ($row['gasometria'] == '1')
    {
    $pdf->cell(40,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(40,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['endoscopia'] == '1')
    {
    $pdf->cell(8,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['rx_abdomen'] == '1')
    {
    $pdf->cell(38,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(38,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['tomografia'] == '1')
    {
    $pdf->cell(10,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(10,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['ecografia_pelvica'] == '1')
    {
    $pdf->cell(36,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(36,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['interconsulta'] == '1')
    {
    $pdf->cell(16,1,utf8_decode('X'),0,1,'C');
    }
	else
	{
	$pdf->cell(16,1,utf8_decode('--'),0,1,'C');
	}


	//SEGUNDA FILA
	if ($row['uroanalisis'] == '1')
    {
    $pdf->cell(38,10,utf8_decode('X'),0,0,'C');
	}
	else
	{
	$pdf->cell(38,10,utf8_decode('--'),0,0,'C');
	}

	if ($row['electrolitos'] == '1')
    {
    $pdf->cell(8,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,10,utf8_decode('--'),0,0,'C');
	}

	if ($row['electro_cardiograma'] == '1')
    {
    $pdf->cell(40,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(40,10,utf8_decode('--'),0,0,'C');
	}


	if ($row['rx_torax'] == '1')
    {
    $pdf->cell(8,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,10,utf8_decode('--'),0,0,'C');
	}

	if ($row['rx_osea'] == '1')
    {
    $pdf->cell(38,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(38,10,utf8_decode('--'),0,0,'C');
	}


	if ($row['resonancia'] == '1')
    {
    $pdf->cell(10,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(10,10,utf8_decode('--'),0,0,'C');
	}


	if ($row['ecografia_abdomen'] == '1')
    {
    $pdf->cell(36,10,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(36,10,utf8_decode('--'),0,0,'C');
	}


	if ($row['otro_examen'] == '1')
    {
    $pdf->cell(16,10,utf8_decode('X'),0,1,'C');
    }
	else
	{
	$pdf->cell(16,10,utf8_decode('--'),0,0,'C');
	}





	



while($rowCie10 = $resultadoCie10->fetch_assoc())
	{
		$pdf->SetFont('Arial','',6);
		$pdf->cell(5,2,"",0,0,'');
		$pdf->cell(65,34,utf8_decode($rowCie10['patologia_cie10']),0,0,'C');

		$pdf->cell(8,34,utf8_decode($rowCie10['cie_ingreso']),0,0,'C');

	}


while($rowCie102 = $resultadoCie102->fetch_assoc())
	{
		$pdf->cell(20,2,"",0,0,'');
$pdf->cell(65,34,utf8_decode($rowCie102['patologia_cie10']),0,0,'C');

		$pdf->cell(10,34,utf8_decode($rowCie102['cie_alta']),0,1,'C');
	}	


//PLAN DE TRATAMIENTO
$pdf->cell(80,10,utf8_decode($row['indicaciones_tratamiento']),0,0,'C');

//MEDICAMENTO
while($rowMed_1 = $resultadoMed_1->fetch_assoc())

{
	$pdf->cell(90,10,utf8_decode($rowMed_1['nombre_medicamento']),0,0,'C');
	$pdf->cell(20,10,utf8_decode($rowMed_1['posologia_medicamento_1']),0,1,'C');

}





//ALTA DE PACIENTES
$pdf->cell(5,20,"",0,1,'C');
	$pdf->SetFont('Arial','',8);
    
	if ($row['alta_domicilio'] == '1')
    {
    $pdf->cell(10,0,utf8_decode('X'),0,0,'C');
	}
	else
	{
	$pdf->cell(38,1,utf8_decode('--'),0,0,'C');
	}

	if ($row['alta_consulta_externa'] == '1')
    {
    $pdf->cell(8,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,1,utf8_decode('--'),0,0,'C');
	}

	if ($row['alta_observacion'] == '1')
    {
    $pdf->cell(40,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(40,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['alta_internacion'] == '1')
    {
    $pdf->cell(8,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(8,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['alta_referencia'] == '1')
    {
    $pdf->cell(38,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(38,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['alta_egreso_vivo'] == '1')
    {
    $pdf->cell(10,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(10,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['alta_condicion_estable'] == '1')
    {
    $pdf->cell(36,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(36,1,utf8_decode('--'),0,0,'C');
	}


	if ($row['alta_condicion_inestable'] == '1')
    {
    $pdf->cell(16,1,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(16,1,utf8_decode('--'),0,0,'C');
	}

	if ($row['alta_dias_incapacidad'] == '1')
    {
    $pdf->cell(16,1,utf8_decode('X'),0,1,'C');
    }
	else
	{
	$pdf->cell(16,1,utf8_decode('--'),0,1,'C');
	}


	//SEGUNDA FILA
	if ($row['alta_servicio_referencia'] == '1')
    {
    $pdf->cell(10,8,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(10,8,utf8_decode('--'),0,0,'C');
	}


	if ($row['alta_establecimiento'] == '1')
    {
    $pdf->cell(36,8,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(36,8,utf8_decode('--'),0,0,'C');
	}


	if ($row['alta_muerto_emergencia'] == '1')
    {
    $pdf->cell(16,8,utf8_decode('X'),0,0,'C');
    }
	else
	{
	$pdf->cell(16,8,utf8_decode('--'),0,0,'C');
	}

	if ($row['alta_causa'] == '1')
    {
    $pdf->cell(16,8,utf8_decode('X'),0,1,'C');
    }
	else
	{
	$pdf->cell(16,8,utf8_decode('--'),0,1,'C');
	}



}




$pdf->Output();




?>
