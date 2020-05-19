<?php
session_start();
mysql_set_charset('utf8');
require("controlDB.php");

//$id=$_POST["id"];
$usuario= $_SESSION['usuario'];
$cedula=$_POST["cedula"];
$codun=$_POST["codun"];

$fechadm=$_POST["fechadm"];
$capfechadm = strtotime($fechadm);
$fechadmision = date('Y-m-d',$capfechadm);

$paterno=$_POST["apepat"];
$paterno = strtoupper($paterno);
$materno=$_POST["apemat"];
$materno = strtoupper($materno);
$primernombre=$_POST["primernombre"];
$primernombre = strtoupper($primernombre);
$segundonombre=$_POST["segundonombre"];
$segundonombre = strtoupper($segundonombre);

$archivo=$_POST["archivo"];

$lnacimiento=$_POST["lnacimiento"];
$lnacimiento= strtoupper($lnacimiento);
$nacionalidad=$_POST["nacionalidad"];
$nacionalidad=strtoupper($nacionalidad);
$gcultural=$_POST["gcultural"];
$gcultural=strtoupper($gcultural);

$telefono=$_POST["telefonop"];

$email=$_POST["email"];
$email=strtolower($email);
//
$fechanac=$_POST["fechanac"];
$capfechanac = strtotime($fechanac);
$fnacimiento = date('Y-m-d',$capfechanac);
//	
/*$ultimaten=$_POST["ultimaten"];
$captultimaten= strtotime($ultimaten);
$fultimaten= date('Y-m-d',$captultimaten);*/
//

$edad=$_POST["edad"];
$sexo=$_POST["sexo"];

$estado=$_POST["estado"];

$direccion=$_POST["direccion"];
$direccion= strtoupper($direccion);

$barrio=$_POST["barrio"];
$barrio= strtoupper($barrio);

$zona=$_POST["zona"];
$zona= strtoupper($zona);

$instruccion=$_POST["instruccion"];
$instruccion= strtoupper($instruccion);

$ocupacion=$_POST["ocupacion"];
$ocupacion= strtoupper($ocupacion);

$empresa=$_POST["empresa"];
$empresa= strtoupper($empresa);

$referido=$_POST["referido"];
$referido= strtoupper($referido);

$seguro=$_POST["seguro"];
$contacto=$_POST["contacto"];
$contacto= strtoupper($contacto);
$parentesco=$_POST["parentesco"];
$parentesco= strtoupper($parentesco);
$telefonof=$_POST["telefonof"];

$direccionf=$_POST["direccionf"];
$direccionf= strtoupper($direccionf);

$ecivil=$_POST["ecivil"];

$provincia=$_POST["provincia"];
$canton=$_POST["canton"];
$parroquia=$_POST["parroquia"];


/*$usuario=$_POST["usuario"];
$nombresmadre=$_POST["nombresmadre"];
$nombresmadre = strtoupper($nombresmadre);
$nombrespadre=$_POST["nombrespadre"];
$nombrespadre = strtoupper($nombrespadre);
*/


$obj = new controlDB();

$funcion=$_POST["funcion"];
$id=$_POST["id"];

if ($funcion=="modificar")
{
	$sql="UPDATE admision_paciente SET cedulaPaciente='$cedula', codunPaciente='$codun', fechadmPaciente='$fechadmision', apePatPaciente='$paterno', apeMatPaciente='$materno', primerNombrePaciente='$primernombre', segundoNombrePaciente='$segundonombre', archivoPaciente='$archivo', lnacPaciente='$lnacimiento', nacionalidadPaciente= '$nacionalidad', gculturalPaciente= '$gcultural', telefonoPaciente='$telefono', emailPaciente='$email', fnacPaciente='$fnacimiento', edadPaciente='$edad', sexoPaciente='$sexo', estadoPaciente='$estado', direccionPaciente='$direccion', barrioPaciente='$barrio', zona='$zona', instruccionPaciente= '$instruccion', ocupacionPaciente='$ocupacion', empresaPaciente='$empresa', lugarReferencia='$referido', contactoPaciente='$contacto', parentesco= '$parentesco', telefonoContacto= '$telefonof', direccionContacto='$direccionf', idEstadoCivil='$ecivil', idProvincia='$provincia', idCanton='$canton', idParroquia='$parroquia', idSeguro= '$seguro'  WHERE idPaciente ='$id'";
	$obj->actualizar($sql);

				echo '<script>
						alert("USUARIO MODIFICADO CON EXITO");
						 window.history.go("http://localhost/admision/buscar.php);
					</script>';
						
	//header("location: buscar.php");
} 
elseif ($funcion=="insertar") 
 
{

$busqueda = "SELECT * FROM admision_paciente WHERE cedulaPaciente = $cedula";
// if ($busqueda)
// {
// 			   $n= 'null';	
//                $sql = "INSERT INTO admision_paciente(cedPaciente) VALUES ('$n')";
//                $obj->actualizar($sql);
              
// }	
	 	
 
$sql="INSERT INTO admision_paciente(cedulaPaciente, codunPaciente, fechadmPaciente, apePatPaciente, apeMatPaciente, primerNombrePaciente, segundoNombrePaciente,archivoPaciente, lnacPaciente, nacionalidadPaciente, gculturalPaciente, telefonoPaciente, emailPaciente, fnacPaciente, edadPaciente, sexoPaciente, estadoPaciente, direccionPaciente, barrioPaciente, zona, instruccionPaciente, ocupacionPaciente, empresaPaciente, lugarReferencia, contactoPaciente, parentesco, telefonoContacto, direccionContacto, idEstadoCivil, idProvincia, idCanton, idParroquia, idSeguro, usuario) VALUES ('$cedula', '$codun','$fechadmision','$paterno','$materno','$primernombre','$segundonombre','$archivo','$lnacimiento','$nacionalidad','$gcultural','$telefono','$email','$fnacimiento','$edad', '$sexo','$estado', '$direccion', '$barrio', '$zona', '$instruccion', '$ocupacion','$empresa', '$referido','$contacto', '$parentesco', '$telefonof','$direccionf', '$ecivil', '$provincia','$canton','$parroquia','$seguro', '$usuario' )"; 

$obj->validarCedula($busqueda);
$obj->actualizar($sql);

}

elseif ($funcion=="eliminar") 
 	
{

	$sql="DELETE FROM Usuario WHERE idPaciente ='$id' ";
	$obj->actualizar($sql);

}


function calcularEdad()
{
									$fechaValidacion=$_POST["ultimaten"];
									$captfv= strtotime($fechaValidacion);
									$fval= date('Y-m-d',$captfv);
				
									$fechanac=$_POST["fechanac"];
									$capfechanac = strtotime($fechanac);
									$fnacimiento = date('Y-m-d',$capfechanac);

									$edad = strtotime($fval) - strtotime($fnacimiento);	

									echo $edad;	

}




?>
