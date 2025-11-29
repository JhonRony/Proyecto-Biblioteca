<?php

include('../model/conexion.php');


$sql  = "SELECT COUNT(*) total FROM libros_prestados";

$resultado=$conexion->query($sql);

$fila = $resultado->fetch_assoc();