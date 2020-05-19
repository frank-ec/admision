<?php
 header('Content-type: text/html; charset=utf-8');
 require ('../controlDB.php');

$id_Provincia = $_POST['idP'];

$queryC = "SELECT idCanton, nombreCanton, idProvincia FROM canton WHERE idProvincia = '$id_Provincia' ORDER BY nombreCanton ASC";

$resultadoC = $conexion->query($queryC);

$html = "<option value '0'>Seleccionar Cantón</option>";

while ($rowC = $resultadoC->fetch_assoc())
{
	echo "<option value = '".$rowC['idCanton']."'>".$rowC['nombreCanton']."</option>";

} 


?>
