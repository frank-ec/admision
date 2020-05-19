<?php
$file = file("certificados.doc");
$file2 = implode("", $file);
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=certificados.doc\r\n\r\n");
header("Content-Length: ".strlen($file2)."\n\n");
echo $file2; 
?>