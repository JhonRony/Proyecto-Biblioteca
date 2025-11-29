<?php
$host = "localhost";
$usuario = "root"; // Reemplaza con tu nombre de usuario de MySQL
$contrasena = ""; // Reemplaza con tu contraseña de MySQL
$nombre_bd = "biblioteca"; //Remplaza con el nombre de tu Base de Datos

// Establecer la conexión con la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $nombre_bd);

// Verificar si hubo un error en la conexión
if ($conexion->connect_errno) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Establecer el conjunto de caracteres de la conexión
$conexion->set_charset("utf8");
?>