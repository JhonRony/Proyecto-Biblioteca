<?php

include('../model/conexion.php');

$sql = "SELECT COUNT(DISTINCT autor) AS total_autores FROM libros";

$resultado=$conexion->query($sql);

$fila = $resultado->fetch_assoc();


