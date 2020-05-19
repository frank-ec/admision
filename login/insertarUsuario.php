<?php
session_start();

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$codigo = $_POST['codigo'];
$perfil = $_POST['perfil'];

if(empty($usuario) || empty($clave))
{
	    echo"<script>alert('Por favor ingrese un Usuario y Contraseña validos'); window.location = 'registroUsuario.php'</script>";
	    
	    //header("location: registroUsuario.php");
	
	
}

if (isset($_POST['usuario']) and isset($_POST['clave']))
{
	
	include('../controlDB.php');
 
	$cedula= mysqli_real_escape_string($conexion, $_POST['cedula']);
	$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
	$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
	$clave = mysqli_real_escape_string($conexion, $_POST['clave']);
	$codigo = mysqli_real_escape_string($conexion, $_POST['codigo']);
	$perfil = mysqli_real_escape_string($conexion, $_POST['perfil']);
	
	
	$insertar = mysqli_query ($conexion, 'INSERT INTO usuario(cedulaUsuario, nombreUsuario, usuario, clave, codigoUsuario, idPerfil ) values ("'.$cedula.'", "'.$nombre.'", "'.$usuario.'", "'.$clave.'", "'.$codigo.'", "'.$perfil.'")') or die ('no se pudo registrar<br>'.mysqli_error($conexion));
	mysqli_close($conexion);
	header ('location: ./');
}
else
{
	header('location: ./');
}

?>