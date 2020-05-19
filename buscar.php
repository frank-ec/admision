<?php
session_start();
require ("controlDB.php");
mysql_set_charset('utf8');


						function buscarF($sql)
						{
							

												$obj = new controlDB();
												

												$datos=$obj->consultar($sql);


									 
											if($datos>0)
											{
												mysql_set_charset('utf8');

												foreach ($datos as $fila)
												{
															echo'<tr>
																<td align ="center">'.$fila['cedulaPaciente'].'</td>
																<td align ="center">'.$fila['codunPaciente'].'</td>
																<td align ="center">'.$fila['archivoPaciente'].'</td>
																<td align ="center">'.$fila['apePatPaciente'].'</td>
																<td align ="center">'.$fila['apeMatPaciente'].'</td>
																<td align ="center">'.$fila['primerNombrePaciente'].'</td>
																<td align ="center">'.$fila['segundoNombrePaciente'].'</td>
																
																<td><img src= "img/lapiz.jpeg" width= "20" onclick="modificar('.$fila['idPaciente'].')">
																<td><img src= "img/impresora.jpg" width= "20" onclick="imprimir('.$fila['idPaciente'].')">
																</td>
																</tr>';	

												}
											}	
											 		else
														{
														echo '<script>
															alert("EL PACIENTE NO EXISTE");
															// window.history.go("http://localhost/admision/buscar.php);
															</script>';

														}

						}

?>

						<html>
							<head>
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<title>BUSQUEDA DATOS</title>
								<link rel="stylesheet" href="css/estilos.css">
								<script>	
								function  modificar(id)
								{
									window.location="http://172.22.67.200/admision/modificar.php?parametro="+id;

								}
								function  eliminar(id)
								{
									window.location="http://172.22.67.200/admision/eliminar.php?parametro="+id;

								}
								function  imprimir(id)
								{
									window.location="http://172.22.67.200/admision//pdf/reporte.php?parametro="+id;

								}


							
						</script>

								</script>
								<div id= "contenedor">
									<header>		
										<img height="65" width="250" src="img/logoMSP.gif">
										
										<h1>CENTRO DE SALUD TABACUNDO TIPO C</h1>
										
										<div align="left">
										<?php
										//echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");
										echo "<h5>La fecha actual es :  ". date('d-m-Y')."</h5>";
										?>				
										</div>
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

				//echo "<br/>" . "ect ect solo usuarios registrados." . "<br/>";
				echo "<br/>" . "<a href='http://172.22.67.200/admision/login'>Ingresar al Sistema</a>";

				exit;
				}						

				?>	

	


										<div align="right">
											 <h6>Bienvenido: <?php echo $_SESSION['usuario']; ?>.  <a href="index.php">Cerrar Sesión</a></h6>
										</div>

									
									
							</head>




							<body>
								
									
							
									
								<section>

								<form  name="frmBuscar" method = "post">
									<div>	
										<center><h2> BUSQUEDA DE DATOS </h2></center>
									</div>	
									<fieldset>

									<img  border="2" align="right" height="180" width="450" src="img/mod_admision.jpg" >    
											<center>
											Ingrese un filtro de busqueda:<br>
											<select name="tipo" id="tipo" class="boton" value="Criterio Busqueda">
																<option value="1">Cédula </option>
																<option value="2">Archivo</option>
																<option value="3">Primer Apellido </option>
																<option value="4">Segundo Apellido</option>
																<option value="5">Primer Nombre </option>
																<option value="6">Segundo Nombre</option>

														</select><br><br>	
										

											<input type="text" name= "txt_bus" value="" style="text-transform:uppercase;"></center><br>
						     					<center><table border ="1">
						     						<td><input type="submit" name= "btn_buscar" value= "Buscar Registro"></td>
						     						<td><input type="button" id="nuevo" name="nuevo" value="Nuevo Registro" onclick= "self.location.href = 'insertar.php'" /></td>
						     							</table>
								
												

											</center>
								</fieldset>		

								</form> 

									<table border= "2" width="100%">	
											<thead>
											<tr>
												<td align ="center"><b>Cedula</b></td>
												<td align ="center"><b>Cod.Único</b></td>
												<td align ="center"><b>Num. Archivo</b></td	>
												<td align ="center"><b>Primer Apellido</b></td>
												<td align ="center"><b>Segundo Apellido</b></td>
												<td align ="center"><b>Primer Nombre</b></td>
												<td align ="center"><b>Segundo Nombre</b></td>
												<td align ="center" colspan="2"><b>Acciones</b></td>
												
												
												

											</tr>
											</thead>



						<?php


						if(isset($_POST["btn_buscar"]))
						{
							$btn=$_POST["btn_buscar"];
							$bus=$_POST["txt_bus"];
							$filtro=$_POST["tipo"];
							


						    if($btn=="Buscar Registro") 
						    {
						    	if (empty($bus)) 
						    	{
						    	echo '<script>
															alert("Por favor, Ingrese un Criterio de Busqueda");
															// window.history.go("http://localhost/admision/buscar.php);
															</script>';
						    	}


						    				else
						    				{	

												if ($filtro == 1)   
										    	{

														buscarF($sql = "SELECT * FROM admision_paciente WHERE cedulaPaciente= '$bus'");
												}



												if ($filtro == 2)   
										    	{		
															buscarF($sql = "SELECT * FROM admision_paciente WHERE archivoPaciente= '$bus' ");
												}	


												if ($filtro == 3)   
										    	{	
															buscarF($sql = "SELECT * FROM admision_paciente WHERE apePatPaciente= '$bus' ");
												}


												if ($filtro == 4)   
										    	{

														
															buscarF($sql = "SELECT * FROM admision_paciente WHERE apeMatPaciente= '$bus' ");
												}	


												if ($filtro == 5)   
										    	{	
															buscarF($sql = "SELECT * FROM admision_paciente WHERE primerNombrePaciente= '$bus' ");
												}


												if ($filtro == 6)   
										    	{	
															buscarF($sql = "SELECT * FROM admision_paciente WHERE segundoNombrePaciente= '$bus' ");
												}	

											}
							

							}	

						} 
								
						?>

			
			</table></center>
			
			
			<!--<center><table border="1">
			
			<td><input type="submit" name="Modificar"  value="Modificar Registro"  onclick="modificar(<?php echo $fila["idPaciente"]?>)"></td>
			<td><input type="submit" name="Eliminar"  value="Baja de Registro"  onclick="eliminar(<?php echo $fila["idPaciente"]?>)"></td></table>-->
				
				<footer>
					<h2>Derechos Reservados: Centro de Salud Tabacundo</h2>
				</footer>
	</section>
	</body>

</html>








	

