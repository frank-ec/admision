<?php
require ("controlDB.php");
?>


<html>
	<head>
		<title>BUSQUEDA DATOS</title>
		<script>	
		function  modificar(id)
		{
			window.location="http://localhost/admision/modificar.php?parametro="+id;

		}
		function  eliminar(id)
		{
			window.location="http://localhost/admision/eliminar.php?parametro="+id;

		}
		</script>
	</head>

	<body>
		<header>
			<div>	
			<center><h2> BUSQUEDA DE DATOS </h2></center>
			</div>
		</header>
			
		<section>

		<form method = "post">

		<center><input type="text" name= "txt_bus" ></center><br>
     		<center><table border ="2">
     					<td><input type="submit" name= "btn_buscar"  value= "Buscar Registro" /></td>
     					<td><input type="button" id="cancelar" name="cancelar" value="Nuevo Registro" onclick= "self.location.href = 'insertar.php'" /></td>
     					</table>
		


</center><br><br>

		</form>

			<table border= "2" width="100%">
					<thead>
					<tr>
					
						<td><b>ID</b></td>
						<td><b>CEDULA</b></td>
						<td><b>CODIGO</b></td>
						<td><b>NOMBRES</b></td>
						<td><b>APELLIDOS</b></td>
						<td><b>MAIL</b></td>
						<td><b>TELEFONO</b></td>
					</tr>
					</thead>
					
					
<?php
if(isset($_POST["btn_buscar"]))
{
	$btn=$_POST["btn_buscar"];
	$bus=$_POST["txt_bus"];

    if($btn=="Buscar Registro")
    {
		$sql = "SELECT * FROM Usuario WHERE cedUsuario = '$bus'";
		
	// $resultado = $mysqli->query($sql);
		// require ("controlDB.php");
			$obj = new controlDB();
			//$datos=$obj->consultar("select * from Usuario");
			$datos=$obj->consultar($sql);


 //while($fila = $datos->fetch_assoc())
		if($datos>0){
			foreach ($datos as $fila)
					{
						echo'<tr>
							<td>'.$fila['idUsuario'].'</td>
							<td>'.$fila['cedUsuario'].'</td>
							<td>'.$fila['codUsuario'].'</td>
							<td>'.$fila['nombreUsuario'].'</td>
							<td>'.$fila['apeUsuario'].'</td>
							<td>'.$fila['mailUsuario'].'</td>
							<td>'.$fila['telefonoUsuario'].'</td>
							</tr>';	

					}
		     	}
		 		else
					{
					echo '<script>
						alert("EL USUARIO NO EXISTE");
						// window.history.go("http://localhost/admision/buscar.php);
						</script>';

					}

			
    } 
}
		
?>
			

	</table></center>

			<table align="center">
			<!--<td><a href="modificar.php?$id=<?php echo $fila['idUsuario'];?>">Modificar</a></td> -->
			<td><input type="submit" name="Modificar"  value="Modificar Registro"  onclick="modificar(<?php echo $fila["idUsuario"]?>)"></td>
			<td><input type="submit" name="Eliminar"  value="Eliminar Registro"  onclick="eliminar(<?php echo $fila["idUsuario"]?>)"></td>
			<!--<td><img  src="img/lapiz.jpeg" width="20" onclick="modificar(<?php echo $fila["idUsuario"]?>)">Modificar</img></td>-->
			</table>
	</section>
	</body>

</html>










