<?php
session_start();
require ("../controlDB.php");

?>
<!DOCTYPE html>
<html lang= "es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CENTRO DE SALUD TABACUNDO TIPO C</title>	
	<link rel="stylesheet" href="css/estilos.css">
</head>
	<body>
		<div id= "contenedor">
			<header>		
				<img height="65" width="250" src="img/logoMSP.gif">
				<!--<img height="65" width="250" src="img/ecuador-ama-la-vida.jpg" style="float:right">-->
				<h1>CENTRO DE SALUD TABACUNDO TIPO C</h1>
			</header>	
			<nav>
				<div id="header">
				<ul class="nav">
					<li><a href="../index.php">PAGINA DE INICIO</a>
						

			</div>	
			</nav>
			</header>
			<section id="contenido">
			
		<div>
		<table>
				<tr><td height="150" align="center">	<h1>INGRESO AL SISTEMA</h1></td></tr>
						
			  <tr><td><form method="POST" action="validar.php">

				
					<table bgcolor="#35abc8"  border ="4" align="center">
			
						
			
					
					<tr><td align="center"><label>Usuario :</label></td>

					<td><input type="text" name="nombre" placeholder="Ingrese su Usuario"/></td>

					<tr><td align="center"><label>Clave : </label></td>
					<td><input type="password" name="clave" placeholder=" Ingrese su Contraseña"/></td>
					</tr>

					<tr><td align="center"><label> Perfil: </label></td>
					<td>	
								
						        
						        <select name="perfil" id="perfil" class="boton"  value="" >
						        	<option value="0" selected="selected">Seleccione el Perfil</option>
						        	<?php
				$queryPer  = "SELECT  perfil_usuario.idPerfil, perfil_usuario.perfilUsuario from  perfil_usuario ";
 				$resultadoPer = $conexion->query($queryPer);


				WHILE ($rowPer = $resultadoPer->fetch_assoc()){ ?>
				<option value="<?php echo $rowPer['idPerfil'];?>"><?php echo utf8_decode($rowPer['perfilUsuario']);?></option>
				<?php } ?> 


			
						        </select>
					</td>
					</tr>
			    	<td colspan="3" align="center" ><button type="submit">Inicar Sesion</button></td>
					
				</table>
			</form></td></tr>
</table>

		</div>

			</section>
			<!--<aside>
				<h2>PUBLICIDAD</h2>
			</aside>-->
			<footer>
				<h2>Derechos Reservados: Centro de Salud Tabacundo</h2>
			</footer>
		</div>
		
</body>
</html>
