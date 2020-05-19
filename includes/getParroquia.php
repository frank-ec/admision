<?php
 header('Content-type: text/html; charset=utf-8');
 require ('../controlDB.php');

$id_Canton = $_POST['idC'];

$queryP = "SELECT idParroquia, nombreParroquia, idCanton FROM parroquia WHERE idCanton = '$id_Canton' ORDER BY nombreParroquia ASC";

$resultadoP = $conexion->query($queryP);

$html = "<option value '0'>Seleccionar Parroquia</option>";

while ($rowP = $resultadoP->fetch_assoc())
{
	echo "<option value = '".$rowP['idParroquia']."'>".$rowP['nombreParroquia']."</option>";

} 


?>
