<?php 
// Url al servidor local
$href1 ='<a href="http://172.22.67.200';
$href2 ='<a href="http://186.47.99.108';
$href3 ='<a href="https://dd17d10.orion-labs.com';

// Rutas a enlaces 
$enlace1 = $href1.'/tarjetero/"><img align="center"
 			border="3" height="50" width="80" src="./img/tarjetero.jpeg"><span>Tarjetero indice</span></a>';

$enlace2 = $href1.'/triaje/"><img align="center"
 			border="3" height="50" width="80" src="./img/triaje.png"><span>Triaje de Emergencia</span></a>';

$enlace3 = $href2.'/resultados/"><img align="center"
 			border="3" height="50" width="80" src="./img/laboratorio.png"><span>Resultados de Laboratorio</span></a>';

$enlace4 = $href3.'/"><img align="center"
 			border="3" height="50" width="80" src="./img/pedido.jpeg"><span>Pedidos de Laboratorio</span></a>';

$cie10 = $href2.'/busqueda_cie10"><img align="center"
                        border="3" height="50" width="80" src="./img/cie10.png"><span>Consulta CIE10</span></a>';

$enlace5 = $href1.'/resultados/"><img align="center"
 			border="3" height="50" width="80" src="./img/rx.jpeg"><span>Resultados de RX</span></a>';

$enlace6 = $href2.'/contrareferencias/"><img align="center"
                        border="3" height="50" width="80" src="./img/contrareferencia.jpeg"><span>Contrareferencias</span></a>';

$enlace7 = $href1.'/triaje/indextv.php"><img align="center"
                        border="3" height="50" width="80" src="./img/manchester.jpg"><span>Pacientes en Emergencia</span></a>';


$enlace8 = $href1.'/images/index.php"><img align="center"
                        border="3" height="50" width="80" src="./img/recortar.png"><span>Comprimir Imágenes</span></a>';


$fondo = $href2.'/fondos/actual.jpeg" target="_blank"><img align="center" border="3" height="50" width="80"
		src="http://186.47.99.108/fondos/actual.jpeg"><span>Fondo de Pantalla Institicional</span></a>';
 
$enlace9 = $href1.'/resultados/index.php/s/EBHAtgaq65E857R"><img align="center"
 			border="3" height="50" width="80" src="./img/farmacia.jpeg"><span>Stock de Farmacia</span></a>';

$enlace10 = ' ';

?>

<!DOCTYPE html>
<html lang= "es">
<head>
	<meta charset="utf-8">
	<title>CENTRO DE SALUD TABACUNDO TIPO C</title>	
	<link rel="stylesheet" href="css/estilos.css">

</head>
<body>
		<div id= "contenedor">
			<header>		
				<img height="65" width="250" src="img/logoMSP.gif">
				<!--<img height="65" width="180" src="http://instituciones.msp.gob.ec/somossalud/images/recursos/BANNER-PRINC_01.png" style="float:right">-->
				<h1>CENTRO DE SALUD TABACUNDO TIPO C</h1>

				<div align="right">
				<?php
				//echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");
				echo "<h5>La fecha actual es :  ". date('d-m-Y')."</h5>";
				?>				
				</div>

			</header>	
			<nav>
				<div id="popup">
				<ul class="nav">
						
                				<li><?php echo $enlace1 ?> </li>	
                				<li><?php echo $enlace2 ?> </li>
                				<li><?php echo $enlace3 ?> </li>
                				<li><?php echo $enlace4 ?> </li>
						 <li><?php echo $cie10 ?> </li>
	               				<li><?php echo $enlace5 ?> </li>
                				<li><?php echo $enlace6 ?> </li>
                				<li><?php echo $enlace7 ?> </li>
                				<li><?php echo $enlace8 ?> </li>
                				<li><?php echo $enlace9 ?> </li>
							
						<li><a href="http://172.22.67.200/admision/herramientas_msp.php"><img align="center" border="3" height="50" width="80" src="./img/herramientas.jpg"><span>Herramientas Informáticas MSP</span></a></li>	
					
<li><a href="http://172.22.67.200/resultados/index.php/s/ZYJp9AsFNAHCsqS" target="_blank"><img align="center" border="3" height="50" width="80" src="img/biblioteca1.jpg"><span>Biblioteca Virtual CST</span></a></li>
		
						<li><a href="consultaseguro" ><img align="center" border="3" height="50" width="80" src="./img/menu/seguros.jpg"><span>Consulta de Seguros para Planillaje</span></a></li>
<!--<li><a href="http://172.22.67.200/admision/formularios/index.php" ><img align="center" border="3" height="50" width="80" src="./img/menu/indice.jpg"><span>Formulario para ingreso de datos.
								</span></a></li>-->
<li><a href="http://172.22.67.200/admision/agendaTelefonica.html" ><img align="center" border="3" height="50" width="80" src="./img/guia-telefonica.jpg"><span>Agenda Telefónica CST.
						</span></a></li>	
				<!--<li><a href="https://goo.gl/forms/1rhrWhgYy2X392cA2" ><img align="center" border="3" height="50" width="80" src="./img/menu/indice.jpg"><span>Formulario para la Gestión de Cuasi-eventos, Eventos Adversos y Eventos Centinela Relacionados con la Atención Clínica/Quirurgica/Administrativa.
								</span></a></li>-->
                
          				<li><a href="https://docs.google.com/forms/d/e/1FAIpQLSdlSQaYAqcUF4ZZyXezk6z4CVSZW5XYogb1sRv5VpAW-rBtVw/viewform?usp=sf_link" ><img align="center" border="3" height="50" width="80" src="./img/control_impresoras.jpg"><span>Control de Impresoras CST.
						</span></a></li>
						
        				<li><?php echo $fondo ?> </li>
			
								
                				
 
								
			</div>	
			</nav>
			</header>
				</ul>	

			<section id="contenido">
            <p style="background-color: yellow;">
        
          
            </p>
			<table border="1" >
				<td>
		 			<div class="slider">

		<ul>
				
					<!--<video autoplay="autoplay" height="400" width="695" src="./video/ESAMYN.mp4" ></video>-->

					
					<!--<video autoplay="autoplay" width="770" src="./video/AgitaTuMundo.mp4"></video>-->

						<li><img src="./img/institucion/logoMSP.jpg"></li>
        
					<li><img src="./img/institucion/1.jpg" alt="" ></li>
					<li><img src="./img/institucion/2.jpg" alt=""></li>
					<li><img src="./img/institucion/4.jpg" alt=""></li>
					<li><img src="./img/institucion/3.jpg" alt=""></li>
					<li><img src="./img/institucion/5.jpg" alt=""></li>
					<li><img src="./img/institucion/6.jpg" alt=""></li>
					<li><img src="./img/institucion/7.jpg" alt=""></li>

					<!--<li><img src="./img/campeonato/logoMSP.JPG"></li>
					<li><img src="./img/campeonato/1.jpg" alt="" ></li>
					<li><img src="./img/campeonato/7.jpg" alt=""></li>
					<li><img src="./img/campeonato/3.jpg" alt=""></li>
					<li><img src="./img/campeonato/4.jpg" alt=""></li> 
					<li><img src="./img/campeonato/5.jpg" alt=""></li>
					<li><img src="./img/campeonato/6.jpg" alt=""></li>
					<li><img src="./img/campeonato/2.jpg" alt=""></li>-->
					
				</ul>
					</div>

						</td>		

			</table>
	</section>
	<aside>
	<div style="text-align:justify" >
			<table border="2" >
						<td><table>
						<td>
						<center><h4>NOTAS IMPORTANTES</h4></center><br>
						<marquee direction="up" scrollamount="1" bgcolor="white"><h3>
									<div style="text-align:justify">
													
													
													

													<!--<p><font color="blue">IMPORTANTE: REALIZAR CURSO VIRTUAL</font><br>	 
													<hr>
													<br>
													
													Se solicita a todo el personal del CST, realizar el curso: 
													<br><br>

													<font color="blue">SALUD EN EL TRABAJO.</font>
													
													<br><br> 
													
													Fecha máxima de entrega del certificado: <font color="blue">14H00 del día Martes 31 de Julio del 2018.</font> 
													<br><br> 
													
													Como ingresar:<font color="blue">Hacer clic en el link: "Cursos."</font>
													<br><br>
													

													

													Clave de matriculación: <font color="blue">trabajo.2018</font>
													<br><br> 
													
												
													



													<font color="blue">
													Atentamente:
													<br><br>

													Dr. Carlos Durán Yánez.
													</font>
													<br>
													Administrador Técnico
													<br> 
													C.S. Tabacundo Tipo C.

													</p><br><br>-->
													


												



					

													<p><font color="blue">SIN NOTAS IMPORTANTES</font><br>	 
													
                                                    <!--
													<br>
													Se solicita a todo el personal del Centro de Salud Tabacundo Tipo C, la revisión de material ESAMyN, que se encuentra en la Biblioteca Virtual de la Intranet<br><br> 
													-->

													<!--<font color="blue">1. </font>
													Profilaxis Post-Exposición a la Rabia.
													<br><br> 
													
													Fecha máxima de entrega del certificado: <font color="blue">14H00 del día Miércoles 14 de Febrero del 2018.</font> 
													<br><br> 
													
													Como ingresar:<font color="blue">Hacer clic en el link: "Curso Profilaxis Post-Exposición a la Rabia."</font>
													<br><br>
													

													<hr>
													<br>
													<font color="blue">2. </font> 
													Test Violencia de Genero.
													<br><br> 

													Clave de matriculación: <font color="blue">Vi0l3nc1a2018</font>
													<br><br> 
													Fecha máxima de entrega del certificado: <font color="blue">14H00 del día 27 de Febrero del 2018.</font>
													<br><br> 
													
													Como ingresar:<font color="blue">Hacer clic en el link: "Test Violencia de Genero."</font>
													<br><br>
													<br><br>
													<hr><hr><hr>
													<br><br>
													



													<font color="blue">
													Atentamente:
													<br><br>

													Dra. Lorena Vizuete J.
													</font>
													<br>
													Administradora Técnica
													<br> 
													C.S. Tabacundo Tipo C.

													</p><br><br>-->
													<hr>
												</div>





													  </h3></marquee>
					
							</td>
					</table>	
					
						</td>
					</table>
					<!--<font color="blue">1. </font>
					<a href ="https://mooc.campusvirtualsp.org/enrol/index.php?id=11" target="_blank">Curso Profilaxis Post-Exposición a la Rabia.</a><br>
					<font color="blue">2. </font>
					<a href ="http://capacitacion.msp.gob.ec/" target="_blank">Test Violencia de Genero</a>
					<br>
					<font color="blue">3. </font>
					<a href ="http://localhost/admision/cursos/esamyn.php" target="_blank">Evaluación Normativa ESAMyN</a>
					<br>
					
					-->

					<a href ="http://capacitacion1.msp.gob.ec/login/index.php" target="_blank"><center><img align="center" border="3" height="40" width="200" src="http://utlajabajio.edu.mx/moodle/pluginfile.php/3691/coursecat/description/cursos.gif"></a></center></a>
					<br> 	 

					<!--<h4>1. No hay Cursos Disponibles</h4><br>-->

					<h4><a href ="http://www.salud.gob.ec/catalogo-de-normas-politicas-reglamentos-protocolos-manuales-planes-guias-y-otros-del-msp/" target="_blank">Catálogo de normas, políticas, reglamentos, protocolos, manuales, planes, guías y otros del MSP.</a></h4><br>	
					<h4><a href ="http://www.salud.gob.ec/guias-de-practica-clinica/" target="_blank">Guías de Práctica Clínica</a></h4>
					<br>
			</aside>
	<footer>
				<center><h2>Derechos Reservados: Centro de Salud Tabacundo Tipo C</h2>
			</footer>
		</div>
		
</body>
</html>
