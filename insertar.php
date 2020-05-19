<?php
session_start();

header('Content-type: text/html; charset=utf-8');
require "controlDB.php";
/*require "conexionub.php";*/
mysql_set_charset('utf8');

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FORMULARIO DE REGISTRO DE DATOS</title>
<script language="javascript" src="js/jquery v3.3.1.js"></script>
<script src="js/selector.js"></script>
<link rel="stylesheet" href="css/estilos.css">

<!-- Cargar Cantones-->
<script language = "javascript">
	$(document).ready(function(){
		$("#provincia").change(function(){
		

		$("#provincia option:selected").each(function(){
			idProvincia = $(this).val();
			$.post("includes/getCanton.php", {idP: idProvincia}, function(data){
			
			$("#canton").html(data);
			});
		});
	});
		
});

function calculaEdad()
{
	$admision = document.frmInsertar.fechadm.value;
	$nacimiento = document.frmInsertar.fechanac.value;
	$calculoEdad = parseInt($admision) - parseInt($nacimiento);
	document.frmInsertar.edad.value = $calculoEdad;

}

</script>	

<!-- Cargar Parroquias-->	

<script language = "javascript">
	$(document).ready(function(){
		$("#canton").change(function(){

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


<body>

			<div id= "contenedor">
			<header>		
				<img height="65" width="250" src="img/logoMSP.gif">
				<h1>CENTRO DE SALUD TABACUNDO TIPO C</h1>
			    <div align="left">
				<?php
				echo "<h5>La fecha actual es :  ". date('d-m-Y')."</h5>";
				?>				
				</div>				
			</header>
			
			
			<nav>
				
			</nav>
			</header>

				<?php
				if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true)
				{

				}
				else
				{
				echo '<script>
						alert("Contenido no disponible, ingrese su usuario y contraseña");
						

					  </script>';

				
				echo "<br/>" . "<a href='http://172.22.67.200/admision/login'>Ingresar al Sistema</a>";

				exit;
				}						

				?>	

						<!--BIENVENIDA A USUARIO-->
							<div align="right">
									   <h6>Bienvenido: <?php echo $_SESSION['usuario']; ?>.  <a href="buscar.php">Salir del Formulario</a></h6>

							</div>		    
									
			
<!--FORMULARIO DE INGRESO DE DATOS-->

<h1>Registro de pacientes :</h1><br>
								
				<form name="frmInsertar" action= "capturar.php" method= "POST" id="formulario">
							<label for= "fechadm"> Fecha de Admisión:
								<input  type= "text" name= "fechadm"  id="fechadm"  value= "<?php echo date('Y-m-d');?>" class= "form-input" size="10" onchange="calculaEdad()"/> </label>

								<label for= "codun">C&#243digo Unico:
								
								<input type= "text" name= "codun" id="codun" class= "form-input" value= "" maxlength="17" ></label>

								 
							<fieldset>
								<legend>Datos Personales :</legend><br>
							    								
								<label for= "cedula" >C&#233dula del Paciente:
								<input type= "text" id= "cedula" name= "cedula" class= "form-input"  value= "" maxlength="10" ></label>
																	
								<label for= "apepat">Primer Apellido: 
								<input type= "text" name= "apepat"  id="apepat" value= "" class= "form-input"  ></label>
								
								<label for= "apemat">Segundo Apellido: 
								<input type= "text" name= "apemat"  id="apemat" value= "" class= "form-input"  ></label>
								
								<label for= "primernombre">Primer Nombre: 
								<input type= "text" name= "primernombre" id="primernombre" value= "" class= "form-input"  ></label>
								
								<label for= "segundonombre">Segundo Nombre: 
								<input type= "text" name= "segundonombre" id="segundonombre" value= "" class= "form-input"  ></label>
														
								<label for= "archivo" >N&#250mero de Archivo: 
								<input type= "text" name= "archivo" id="archivo" class= "form-input"  value= "" ></label>
								
								<label for= "lnacimiento">Lugar de Nacimiento: 
								<input type= "text" name= "lnacimiento" id="lnacimiento" class= "form-input"  value= "" ></label>
								
								<label for= "nacionalidad">Pais de Origen: 
								<input type= "text" name= "nacionalidad" id="nacionalidad"  value= "" class= "form-input"></label>
								

								<label for= "telefonop">Teléfono del Paciente: 
								<input type= "text" name= "telefonop" id="telefonop" class= "form-input"  value= "" ></label>
								
								<label for= "email">E-mail del Paciente: 
								<input type= "text" name= "email" id="email"  value= "" class= "form-input"></label>
								

								<label for= "fechanac">Fecha de Nacimiento: 
								<input type= "date" name= "fechanac" id="fechanac"  value= "" class= "form-input"  onchange="calculaEdad()" ></label>
								<br><br>
								
								<label for= "edad">Edad del Paciente: 
								<br>
								<input type= "text" name= "edad" id="edad" value= ""  class= "form-input" >

				
					<table align="right" >			
					<td align="right"><label for= "ecivil">Estado civil   :
						        <td align="right"><select name="ecivil" id="ecivil" class="boton"  value="">
						        	<option value="0" selected="selected">Seleccione el Estado Civil</option>
						        	<?php 
									$queryEC = "SELECT idEstadoCivil, estadoCivil FROM estado_civil";
 									$resultadoEC = $conexion->query($queryEC);
									WHILE ($rowEC = $resultadoEC->fetch_assoc()){ ?>
									<option value="<?php echo $rowEC['idEstadoCivil'];?>"><?php echo utf8_decode($rowEC['estadoCivil']);?></option>
									<?php } ?> 	
						        </select></label></td>
						      

					    	
							<td align="right"><label for= "sexo">Sexo del Paciente: 

								 <td align="right"><select name="sexo" id="sexo" class="boton" value="" >
									<option value="0" selected="selected">Seleccione el Sexo</option>
									<option value="MASCULINO" >MASCULINO</option>
									<option value="FEMENINO" >FEMENINO</option>
								</select></label></td>
							</tr>	

							<tr>

						  	<td align="right"><label for= "gcultural">Grupo Cultural: 

								 <td align="right"><select name="gcultural" id="gcultural" class="boton" value="" >
									<option value="0" selected="selected">Seleccione el Grupo Cultural</option>
									<option value="MESTIZO">MESTIZO</option>
									<option value="INDIGENA">INDIGENA</option>	
									<option value="AFRO ECUATORIANO">AFRO ECUATORIANO</option>
									<option value="BLANCO">BLANCO</option>
								</select></label></td>

								

							<td align="right"><label for= "estado">Estado  : 
						       <td align="right"><select name="estado" id="estado" class="boton"  value="1" onclick="comprobarOption()">
						        	<option value="0" selected="selected">Seleccione el Estado</option>
						        	<option value="ACTIVO">ACTIVO</option>
						        	<option value="PASIVO">PASIVO</option>
						        	<option value="BAJA">BAJA</option>
						        </select></label></td>

							</tr>
						    
					</table>
								
							</fieldset>

								<label for= "referido">Referido de: 
								<input type= "text" name= "referido"  value= "" class= "form-input" maxlength="40" ></label>

							<fieldset>

								<legend>Dirección del Paciente :</legend><br>	

									
									<!-- Combos Ubicación-->
									<!-- Cargar Provincias-->
									
									<label for="provincia">Provincia:
									<select name="provincia" id="provincia" class="boton">
									<option value= '30'>Seleccione la Provincia</option>	
									

									<?php 
									$query = "SELECT idProvincia, nombreProvincia FROM provincia ORDER BY nombreProvincia ASC";
 									$resultado = $conexion->query($query);
									WHILE ($row = $resultado->fetch_assoc()){ ?>
									<option value="<?php echo $row['idProvincia'];?>"><?php echo utf8_decode($row['nombreProvincia']);?></option>
									<?php } ?> 	
									</select></label>
									
									<label for="canton">Canton:
									<select name="canton" id="canton" class="boton">
									<option value= '230'>Seleccione el Cantón</option>	
									</select></label>
									

									
									<label for="parroquia">Parroquia:
									<select name="parroquia" id="parroquia" class="boton">
									<option value= '1500'>Seleccione la  Parroquia</option>	
									</select></label><br><br><br>

									<label for= "zona"> Zona : 
						        <select name="zona" id="zona" class="boton"  value="" >
						        	<option value="0" selected="selected">Seleccione la Zona</option>
						        	<option value="URBANA">URBANA</option>
						        	<option value="RURAL">RURAL</option>
						        </select></label>

						        <label for= "barrio">Barrio : 
								<input type= "text" name= "barrio" id="barrio" class= "form-input"  value= "" maxlength="20" ></label>
									



									<label for= "direccion">Direccion del Paciente: <br>
									<textarea name= "direccion"  id="direccion" rows="1" cols="50" value= "" class= "form-input" maxlength="30"></textarea></label>
								
							</fieldset>



							<fieldset>
								
							<legend>Datos Ocupacionales del Paciente :</legend>

							<label for= "instruccion">Instrucción (Último año aprobado) : 
						        <select name="instruccion" id="instruccion" class="boton"  value="" >
						        	<option value="NINGUNA" selected="selected">Seleccione la Instrucción</option>
						        	<option value="PRIMARIA">PRIMARIA</option>
						        	<option value="SECUNDARIA">SECUNDARIA</option>
						        	<option value="TECNOLOGIA">TECNOLOGIA</option>
						        	<option value="SUPERIOR">SUPERIOR</option>
						        	<option value="MAESTRIA">MAESTRIA</option>
						        	<option value="PHD">PHD</option>

						        </select></label>


								<label for= "ocupacion">Ocupación laboral: 
								<input type= "text" name= "ocupacion" id="ocupacion"  value= "" class= "form-input" maxlength="20"></label>
								<label for= "empresa">Empresa donde trabaja: 
								<input type= "text" name= "empresa"  id="empresa" value= "" class= "form-input"  maxlength="" ></label>	
								<br><br><br><br>
								<label for= "seguro">Seguro: 
						        <select name="seguro" id="seguro" class="boton"  value="" >
						        	<option value="6" selected="selected">Seleccione un Tipo de Seguro</option>
						        	<?php 
									$querySEG = "SELECT idSeguro, tipoSeguro, nombreSeguro FROM seguro";
 									$resultadoSEG = $conexion->query($querySEG);
									WHILE ($rowSEG = $resultadoSEG->fetch_assoc()){ ?>
									<option value="<?php echo $rowSEG['idSeguro'];?>"><?php echo utf8_decode($rowSEG['nombreSeguro']);?></option>
									<?php } ?> 	
						        </select></label>

							</fieldset>

							<input type="hidden" name="funcion" value="insertar">
							<fieldset>	
							<legend>Datos de Contactos :</legend>

							<label for= "contacto">En caso necesario llamar a : 
							<input type="text" name="contacto" id="contacto"  value= ""  class= "form-input" maxlength="30">
							</label>								
							<label for= "parentesco">Parentesco Familiar : 
							<input type="text" name="parentesco" id="parentesco" value= ""  class= "form-input" maxlength="30" >
							</label>
							<label for= "telefonof">Teléfono del Familiar : 
							<input type="text" name="telefonof" id="telefonof" value= ""  class= "form-input" maxlength="10">
							</label>

							<label for= "direccionf">Direccion del Familiar: <br>
									<textarea name= "direccionf"  id="direccionf" rows="1" cols="100" value= "" class= "form-input"  maxlength="40"></textarea></label>

						</fieldset>

						<fieldset>
							<center><input class="form-btn" name= "submit" type="submit" value= "Guardar"/>
							<input class= "form-btn" name= "reset" type="reset" value= "Limpiar" />
			    		
							<input type="hidden" name="funcion" value="insertar">
							<input type="hidden" name="id" value="">
						</fieldset>						
						
				
				</form>
			
			
			<footer>
				<h2>Derechos Reservados: Centro de Salud Tabacundo</h2>
			</footer>
		
			
</div>
</body>
</html> 
