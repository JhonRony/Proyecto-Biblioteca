<?php

include('../model/conexion.php');


$sql  = "SELECT COUNT(*) total FROM libros";

$resultado=$conexion->query($sql);

$fila = $resultado->fetch_assoc();


