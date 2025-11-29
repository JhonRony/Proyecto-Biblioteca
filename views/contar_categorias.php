
<?php

include('../model/conexion.php');

$sql = "SELECT COUNT(DISTINCT categoria) AS total FROM categoria";

$resultado=$conexion->query($sql);

$fila = $resultado->fetch_assoc();


