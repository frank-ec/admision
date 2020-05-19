<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>MODIFICAR DATOS</title>
	<link rel="stylesheet" href="css/estilos.css">

<!-- Cargar Cantones-->
<script language = "javascript">
	$(document).ready(function(){
		$("#provincia").change(function(){
		
		//$('#canton').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');


		$("#provincia option:selected").each(function(){
			idProvincia = $(this).val();
			$.post("includes/getCanton.php", {idP: idProvincia}, function(data){
			
			$("#canton").html(data);
			});
		});
	});
		
});
</script>	

<!-- Cargar Parroquias-->	

<script language = "javascript">
	$(document).ready(function(){
		$("#canton").change(function(){
		
		//$('#canton').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');


		$("#canton option:selected").each(function(){
			idCanton = $(this).val();
			$.post("includes/getParroquia.php", {idC: idCanton}, function(data){
			
			$("#parroquia").html(data);
			});
		});
	});
		
});
</script>





</head>
			<div id= "contenedor">
			<header>		
				<img height="65" width="250" src="img/logoMSP.gif">
				<img height="65" width="250" src="img/ecuador-ama-la-vida.jpg" style="float:right">
				<h1>CENTRO DE SALUD TABACUNDO TIPO C</h1>

			<div align="left">
					<?php
					//echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");
					echo "<h5>La fecha actual es :  ". date('d-m-Y')."</h5>";
					?>				
				</div>

			</header>
				<div align="right">
					 <h6>Bienvenido: <?php echo $_SESSION['usuario']; ?>.  <a href="buscar.php">Salir del formulario</a></h6>
				</div>
			
</head><br><br><br><br>

<body>

<?php
$id= $_GET['parametro'];

require "controlDB.php";
$obj = new controlDB();
$data=$obj->consultar("SELECT * FROM admision_paciente WHERE idPaciente = $id");

?>
	<h2 align="center">MODIFICAR DATOS</h2><br>
	<hr />

	<form action="capturar.php" method="post">
		<center><table width= "56%" border="1" align="center">
		<?php foreach ($data as $fila) { ?>
			
		
		<tr>
			<td align="right" bgcolor="#45b39d" >Id Paciente (BDD): </td>	
			<td align="center" bgcolor="#45b39d"  ><?php echo $id; ?> </td>
		</tr> 
		<tr>
			<td align="right" bgcolor="">Cédula :</td>
			<td><input type="text" name="cedula" value="<?php echo $fila["cedulaPaciente"]; ?>"/></td>
		</tr>
		<tr>
			<td align="right" >Código Ún¡co :</td>
			<td><input type="text" name="codun" value="<?php echo $fila["codunPaciente"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Fecha de Admisión :</td>
			<td><input type="text" name="fechadm" value="<?php echo $fila["fechadmPaciente"]; ?>"/></td>
		</tr>


		<tr>
			<td align="right" >Primer Apellido :</td>
			<td><input type="text" name="apepat" value="<?php echo $fila["apePatPaciente"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Segundo Apellido :</td>
			<td><input type="text" name="apemat" value="<?php echo $fila["apeMatPaciente"]; ?>"/></td>
		</tr> 	

		<tr>
			<td align="right" >Primer Nombre :</td>
			<td><input type="text" name="primernombre" value="<?php echo $fila["primerNombrePaciente"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Segundo Nombre :</td>
			<td><input type="text" name="segundonombre" value="<?php echo $fila["segundoNombrePaciente"]; ?>"/></td>
		</tr>


		<tr>
			<td align="right" >Num. Archivo :</td> 
			<td><input type="text" name="archivo" value="<?php echo $fila["archivoPaciente"]; ?>"/></td>
		</tr>
		<tr>
			<td align="right" >Lugar de Nacimiento :</td>
			<td><input type="text" name="lnacimiento" value="<?php echo $fila["lnacPaciente"]; ?>"/></td>
		</tr>
		<tr>
			<td align="right" >Nacionalidad Pais :</td>
			<td><input type="text" name="nacionalidad" value="<?php echo $fila["nacionalidadPaciente"]; ?>"/></td>
		</tr>
		<tr>
			<td align="right" >Grupo Cultural (Autoidenficación) :</td>
			<td><input type="text" name="gcultural" value="<?php echo $fila["gculturalPaciente"]; ?>"/></td>
		</tr>
		<tr>
			<td align="right" >Teléfono del Paciente:</td>
			<td><input type="text" name="telefonop" value="<?php echo $fila["telefonoPaciente"]; ?>"/></td>
		</tr>
		<tr>
			<td align="right" >E-mail del Paciente:</td>
			<td><input type="text" name="email" value="<?php echo $fila["emailPaciente"]; ?>"/></td>
		</tr>
		<tr>
			<td align="right" >Fecha de Nacimiento :</td>
			<td><input type="text" name="fechanac" value="<?php echo $fila["fnacPaciente"]; ?>"/></td>
		</tr>
		<tr>
			<td align="right" >Edad :</td>
			<td><input type="text" name="edad" value="<?php echo $fila["edadPaciente"]; ?>"/></td>
		</tr>
		
		

		<tr>
			<td align="right" >Sexo del Paciente :</td>
			
			<td>
			<select name="sexo" id="sexo" class="boton"  >
			   
			   	
				<?php 
						$querySex = "SELECT idPaciente, sexoPaciente FROM admision_paciente where idPaciente = $id ";
 						$resultadoSex = $conexion->query($querySex);
						WHILE ($rowSex = $resultadoSex->fetch_assoc()){ ?>
						<option value="<?php echo $rowSex['sexoPaciente'];?>"><?php echo utf8_decode($rowSex['sexoPaciente']);?></option>
				<?php } ?> 
						<option value="M">MASCULINO</option> 
						<option value="F">FEMENINO</option> 
			</select>
			</td>	

		<tr>
			<td align="right" >Estado del Paciente :</td>

			<td>
			<select name="estado" id="estado" class="boton"  value="" >
			   
			   	
				<?php 
						$queryEst = "SELECT idPaciente, estadoPaciente FROM admision_paciente where idPaciente = $id ";
 						$resultadoEst = $conexion->query($queryEst);
						WHILE ($rowEst = $resultadoEst->fetch_assoc()){ ?>
						<option value="<?php echo $rowEst['estadoPaciente'];?>"><?php echo utf8_decode($rowEst['estadoPaciente']);?></option>
						
				<?php } ?> 
						<option value="ACTIVO">ACTIVO</option> 
						<option value="PASIVO">PASIVO</option> 
						<option value="BAJA">BAJA</option> 
			</select>			
			</td>			
		 </tr>	


		<tr>
			<td align="right" >Dirección del Paciente :</td>
			<td><input type="text" name="direccion" value="<?php echo $fila["direccionPaciente"]; ?>"/></td>
		</tr>


		<tr>
			<td align="right" >Barrio :</td>
			<td><input type="text" name="barrio" value="<?php echo $fila["barrioPaciente"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Zona :</td>

			<td>
			<select name="zona" id="zona" class="boton"  value="" >
			   
			   	
				<?php 
						$queryZona = "SELECT idPaciente, zona FROM admision_paciente where idPaciente = $id ";
 						$resultadoZona = $conexion->query($queryZona);
						WHILE ($rowZona = $resultadoZona->fetch_assoc()){ ?>
						<option value="<?php echo $rowZona['zona'];?>"><?php echo utf8_decode($rowZona['zona']);?></option>
						
				<?php } ?> 
						<option value="URB">URBANA</option> 
						<option value="RURAL">RURAL</option> 
			</select>			
			</td>			
		 </tr>



		<tr>
			<td align="right" >Instrucción del Paciente :</td>

			<td>
			<select name="instruccion" id="instruccion" class="boton"  value="" >
			   
			   	
				<?php 
						$queryInstr = "SELECT idPaciente, instruccionPaciente FROM admision_paciente where idPaciente = $id ";
 						$resultadoInstr = $conexion->query($queryInstr);
						WHILE ($rowInstr = $resultadoInstr->fetch_assoc()){ ?>
						<option value="<?php echo $rowInstr['instruccionPaciente'];?>"><?php echo utf8_decode($rowInstr['instruccionPaciente']);?></option>
						
				<?php } ?> 
									<option value="NINGUNA">NINGUNA</option>
						        	<option value="PRIMARIA">PRIMARIA</option>
						        	<option value="SECUNDARIA">SECUNDARIA</option>
						        	<option value="TECNOLOGIA">TECNOLOGIA</option>
						        	<option value="SUPERIOR">SUPERIOR</option>
						        	<option value="MAESTRIA">MAESTRIA</option>
						        	<option value="PHD">PHD</option>
			</select>			
			</td>			
		 </tr>

		<tr>
			<td align="right" >Ocupación del Paciente :</td>
			<td><input type="text" name="ocupacion" value="<?php echo $fila["ocupacionPaciente"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Empresa en la que labora :</td>
			<td><input type="text" name="empresa" value="<?php echo $fila["empresaPaciente"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Referido de :</td>
			<td><input type="text" name="referido" value="<?php echo $fila["lugarReferencia"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Tipo de Seguro del Paciente :</td>


		<td>
			<select name="seguro" id="seguro" class="boton"  value="" >
			   
			   	<?php
				$querySeg = "SELECT admision_paciente.idPaciente, admision_paciente.idSeguro, seguro.idSeguro, seguro.nombreSeguro from admision_paciente INNER JOIN seguro ON  admision_paciente.idSeguro = seguro.idSeguro and admision_paciente.idPaciente = $id";
 				$resultadoSeg = $conexion->query($querySeg);


				WHILE ($rowSeg = $resultadoSeg->fetch_assoc()){ ?>
				<option value="<?php echo $rowSeg['idSeguro'];?>"><?php echo utf8_decode($rowSeg['nombreSeguro']);?></option>
				<?php } ?> 


				<?php 

									$querySeg = "SELECT idSeguro, tipoSeguro, nombreSeguro FROM seguro";
 									$resultadoSeg = $conexion->query($querySeg);
									WHILE ($rowSeg = $resultadoSeg->fetch_assoc()){ ?>
									<option value="<?php echo $rowSeg['idSeguro'];?>"><?php echo utf8_decode($rowSeg['nombreSeguro']);?></option>

				<?php } ?> 	

				
					
				
			</select>
		</td>	



		</tr>
		

		<tr>
			<td align="right" >Contacto :</td>
			<td><input type="text" name="contacto" value="<?php echo $fila["contactoPaciente"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Parentesco :</td>
			<td><input type="text" name="parentesco" value="<?php echo $fila["parentesco"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Teléfono del Contacto :</td>
			<td><input type="text" name="telefonof" value="<?php echo $fila["telefonoContacto"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Dirección del Contacto :</td>
			<td><input type="text" name="direccionf" value="<?php echo $fila["direccionContacto"]; ?>"/></td>
		</tr>

		<tr>
			<td align="right" >Estado Civil del Paciente :</td>


		<td>
			<select name="ecivil" id="ecivil" class="boton"  value="" >
			   
			   	<?php 
				$queryEC = "SELECT admision_paciente.idPaciente, admision_paciente.idEstadoCivil, estado_civil.idEstadoCivil, estado_civil.estadoCivil from admision_paciente INNER JOIN estado_civil ON  admision_paciente.idEstadoCivil = estado_civil.idEstadoCivil and admision_paciente.idPaciente = $id";
 				$resultadoEC = $conexion->query($queryEC);
				WHILE ($rowEC = $resultadoEC->fetch_assoc()){ ?>
				<option value="<?php echo $rowEC['idEstadoCivil'];?>"><?php echo utf8_decode($rowEC['estadoCivil']);?></option>
									<?php } ?> 	
				
				<?php 
						$queryEC = "SELECT idEstadoCivil, estadoCivil FROM estado_civil";
 						$resultadoEC = $conexion->query($queryEC);
						WHILE ($rowEC = $resultadoEC->fetch_assoc()){ ?>
						<option value="<?php echo $rowEC['idEstadoCivil'];?>"><?php echo utf8_decode($rowEC['estadoCivil']);?></option>
				<?php } ?> 
				<option>									
			</select>
		</td>	



		</tr>

		<tr>
			<td align="right" >Provincia :</td>
			<td>
			<select name="provincia" id="provincia" class="boton"  value="" >
			   
			   	<?php 
				$queryP = "SELECT admision_paciente.idPaciente, admision_paciente.idProvincia, provincia.idProvincia, provincia.nombreProvincia from admision_paciente INNER JOIN provincia ON  admision_paciente.idProvincia = provincia.idProvincia and admision_paciente.idPaciente = $id";
 				$resultadoP = $conexion->query($queryP);
				WHILE ($rowP = $resultadoP->fetch_assoc()){ ?>
				<option value="<?php echo $rowP['idProvincia'];?>"><?php echo utf8_decode($rowP['nombreProvincia']);?></option>
				<?php } ?> 

				<?php 
					$query = "SELECT idProvincia, nombreProvincia FROM provincia ORDER BY nombreProvincia ASC";
 					$resultado = $conexion->query($query);
					WHILE ($row = $resultado->fetch_assoc()){ ?>
					<option value="<?php echo $row['idProvincia'];?>"><?php echo utf8_decode($row['nombreProvincia']);?></option>
				<?php } ?>	

				<option>									
			</select>
		</td>
		<tr>
			<td align="right" >Canton :</td>
			<td>
			<select name="canton" id="canton" class="boton"  value="" >
			   
			   	<?php 
				$queryC = "SELECT admision_paciente.idPaciente, admision_paciente.idCanton, canton.idCanton, canton.nombreCanton from admision_paciente INNER JOIN canton ON  admision_paciente.idCanton = canton.idCanton and admision_paciente.idPaciente = $id";
 				$resultadoC = $conexion->query($queryC);
				WHILE ($rowC = $resultadoC->fetch_assoc()){ ?>
				<option value="<?php echo $rowC['idCanton'];?>"><?php echo utf8_decode($rowC['nombreCanton']);?></option>
				<?php } ?> 	

				<?php 
					$queryCant = "SELECT idCanton, nombreCanton FROM canton ORDER BY nombreCanton ASC";
 					$resultadoCant = $conexion->query($queryCant);
					WHILE ($rowCant = $resultadoCant->fetch_assoc()){ ?>
					<option value="<?php echo $rowCant['idCanton'];?>"><?php echo utf8_decode($rowCant['nombreCanton']);?></option>
				<?php } ?>	

				<option>									
			</select>
		</td>
		</tr>

		<td align="right" >Parroquia :</td>
			<td>
			<select name="parroquia" id="parroquia" class="boton"  value="" >
			   
			   	<?php 
				$queryParr = "SELECT admision_paciente.idPaciente, admision_paciente.idParroquia, parroquia.idParroquia, parroquia.nombreParroquia from admision_paciente INNER JOIN parroquia ON  admision_paciente.idParroquia = parroquia.idParroquia and admision_paciente.idPaciente = $id";
 				$resultadoParr = $conexion->query($queryParr);
				WHILE ($rowParr = $resultadoParr->fetch_assoc()){ ?>
				<option value="<?php echo $rowParr['idParroquia'];?>"><?php echo utf8_decode($rowParr['nombreParroquia']);?></option>
				<?php } ?> 	


				<?php 
					$queryParrq = "SELECT idParroquia, nombreParroquia FROM parroquia ORDER BY nombreParroquia ASC";
 					$resultadoParrq = $conexion->query($queryParrq);
					WHILE ($rowParrq = $resultadoParrq->fetch_assoc()){ ?>
					<option value="<?php echo $rowParrq['idParroquia'];?>"><?php echo utf8_decode($rowParrq['nombreParroquia']);?></option>
				<?php } ?>

				<option>									


		</td>
		</tr>

		
		<td colspan= "2" align="center"><input type="submit" value="ACTUALIZAR" /></td>
		</tr>

		<?php } ?>

		</table></center>
		<input type="hidden" name="funcion" value="modificar">
		<input type="hidden" name="id" value="<?php echo $id; ?>">

		</form>

</body>
</html>