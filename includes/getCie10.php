<?php
 header('Content-type: text/html; charset=utf-8');
 require ("../controlDB.php");

$id_Cie10 = $_POST['idCie'];

$queryCie10 = "SELECT idCie10, codigo_cie10, patologia_cie10 FROM cie_10 WHERE idCie10 = '$id_Cie10' ORDER BY patologia_cie10 ASC";

$resultadoCie10 = $conexion->query($queryCie10);

$html = "<option value ''></option>";

while ($rowCie10 = $resultadoCie10->fetch_assoc())
{
	
	echo "<option value = '".$rowCie10['idCie10']."'>".$rowCie10['patologia_cie10']."</option>";


} 


?>
