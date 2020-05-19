<?php

$conexion=mysqli_connect('localhost', 'root', 'cs17d10tabacundo') or die ('No se pudo conectar a la base de datos'.mysqli_error($conexion));
mysqli_select_db($conexion, 'ADMISION') or die("No se ha encontrado la BDD");

?>



