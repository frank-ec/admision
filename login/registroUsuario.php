<?php
session_start();
require "../controlDB.php";
?>
<!doctype html>
<html>

<head>
<meta chaset="utf-8">
<title>REGISTRO DE USUARIOS DEL SISTEMA</title>
<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

			<div id= "contenedor">
			<header>		
				<img height="90" width="450" src="img/logoMSP.gif"><br><br>
				<h1>CENTRO DE SALUD TABACUNDO TIPO C</h1><br>
				<center><h2>Formulario de Registro de Nuevos Usuarios <h2></h2></center>
			</header>	
			<nav>
				<div id="header">
				

			</div>	
			</nav>
			</header>

			<div align="right">
					 <h6>Bienvenido: <?php echo $_SESSION['usuario']; ?>.  <a href="../mantenimiento.php">Salir del formulario</a></h6>
				</div>

			<section>


				<form name="frmInsertar" action= "insertarUsuario.php" method= "POST" id="formulario">
				<!--t

				able  border="2" width="100%" bgcolor=" #eafaf1">
							<td height="10" align="center">-->
					

							<form>
								<br>
								<h2>Ingrese el Nuevo Usuario :</h2><br>

								<center><label for= "cedula"><p>Cedula : </p></label>								
								<p><input type= "cedula" name= "cedula" id="cedula" value= "" size="22 " class= "form-input" ></p><br>

								<center><label for= "nombre"><p>Nombre : </p></label>								
								<p><input type= "nombre" name= "nombre" id="nombre" value= "" size="22 " class= "form-input" ></p><br>

								<center><label for= "usuario"><p>Usuario : </p></label>								
								<p><input type= "usuario" name= "usuario" id="usuario" value= "" size="22 " class= "form-input" ></p><br>

								<label for= "clave"><p>Clave  : </p></label>
								<p><input type="password" name="clave" id="clave" value= "" size="20" class= "form-input" ></p><br><br>
																						
								<center><label for= "codigo"><p>Codigo : </p></label>
								<p><input type= "codigo" name= "codigo" id="codigo" value= "" size="22 " class= "form-input" ></p><br>

					
						

								<center><label> Perfil: </label>

								 <select name="perfil" id="perfil" class="boton"  value="" >
						        	<option value="0" selected="selected">Seleccione el Perfil</option>
						        	<?php
									$queryPer  = "SELECT  perfil_usuario.idPerfil, perfil_usuario.perfilUsuario from  perfil_usuario ";
 									$resultadoPer = $conexion->query($queryPer);


									WHILE ($rowPer = $resultadoPer->fetch_assoc()){ ?>
									<option value="<?php echo $rowPer['idPerfil'];?>"><?php echo utf8_decode($rowPer['perfilUsuario']);?></option>
									<?php } ?> 


			
						        </select>
<br><br><br><br>

								<button onclick="registrar()">Crear Nuevo Usuario</button>

							

								<script type = "text/javascript">
								function registrar()
								{
									windows.location="../mantenimiento.php";

								}
								</script>

								</center>
 							</form>	
							
								


							

					
						
			<footer>
				<h2>Derechos Reservados: Centro de Salud Tabacundo</h2>
			</footer>
		</div>
			
</div>
</body>
</html> 