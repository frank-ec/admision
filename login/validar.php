<?php
mysql_set_charset('utf8');
session_start();



$usuario = $_POST['nombre'];
$clave = $_POST['clave'];
$perfil = $_POST['perfil'];

if(empty($usuario) || empty($clave)){
	    echo"<script>alert('Por favor ingrese su Usuario y Contraseña'); window.location = 'index.php'</script>";
	    //header("Location: index.php");
	
	exit();
}

mysql_connect('localhost','root','tabacundocst2018') or die("Error al conectar " . mysql_error());
mysql_select_db('ADMISION') or die ("Error al seleccionar la Base de datos: " . mysql_error());

$result = mysql_query("SELECT usuario.idUsuario, usuario.clave, usuario.idPerfil, perfil_usuario.idPerfil from usuario INNER JOIN perfil_usuario ON usuario.idPerfil = perfil_usuario.idPerfil and usuario='" . $usuario . "'");

if($row = mysql_fetch_array($result))
{
	if($row['clave'] == $clave) 
	{	
				
		if($row['idPerfil'] == $perfil  )
		{
			if ($perfil == 1)
			{	

					$_SESSION['usuario'] = $usuario;
					

					header("Location: ../buscar.php");
			}

			if ($perfil == 2)
			{	

					$_SESSION['usuario'] = $usuario;
					

					header("Location: ../mantenimiento.php");
			}

			if ($perfil == 3)
			{	

					$_SESSION['usuario'] = $usuario;
					

					header("Location: ../buscarEnfermeraEmergencia.php");
			}
		
			if ($perfil == 4)
			{	

					$_SESSION['usuario'] = $usuario;
					

					header("Location: ../buscarPacienteRegistrado.php");
			}


		}
			


					else
					{
					
					echo"<script>alert('Escoja el perfil correcto'); window.location = 'index.php'</script>";
				exit();
							
					}
				
				}

				else{
					
					echo"<script>alert('Usuario o Contraseña incorrectos'); window.location = 'index.php'</script>";
				exit();
					
					exit();
				}
			}

			else{
				header("Location: index.php");
				exit();
}
 


?>
