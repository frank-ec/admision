<?php

$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];

if(empty($usuario) || empty($pass)){
	    echo"<script>alert('Por favor ingrese su Usuario y Contraseña'); window.location = 'index.php'</script>";
	    //header("Location: index.php");
	
	exit();
}

mysql_connect('172.22.67.200','root','root') or die("Error al conectar " . mysql_error());
mysql_select_db('CSTABACUNDO') or die ("Error al seleccionar la Base de datos: " . mysql_error());

$result = mysql_query("SELECT * from Usuarios where usuario='" . $usuario . "'");

if($row = mysql_fetch_array($result)){
	if($row['password'] ==  $pass){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: ../buscar.php");
	}else{
		echo"<script>alert('Usuario o Contraseña incorrectos'); window.location = 'index.php'</script>";
	exit();
		
		exit();
	}
}else{
	header("Location: index.php");
	exit();
}


?>
