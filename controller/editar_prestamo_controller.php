<?php
include('../model/conexion.php');
include('../model/prestamo_modelo.php');

if (isset($_GET['id'])) {
    $idPrestamo = $_GET['id'];
    $resultado = obtenerPrestamoPorID($conexion, $idPrestamo);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
    } else {
        echo "No se encontró el préstamo de libros.";
        exit();
    }
} else {
    echo "No se especificó el ID del préstamo.";
    exit();
}
?>
