<?php
include('../model/conexion.php');

if (isset($_POST['id_prestamo']) && isset($_POST['fecha_prestamo'])) {
    $idPrestamo = $_POST['id_prestamo'];
    $fechaPrestamo = $_POST['fecha_prestamo'];

    $sql = "UPDATE libros_prestados SET Fecha_Prestamo = '$fechaPrestamo' WHERE ID_Prestado = $idPrestamo";
    if ($conexion->query($sql) === TRUE) {
        $conexion->close();
        header("Location: ../views/prestar_libros.php");
        exit();
    } else {
        echo "Error al actualizar la fecha de préstamo: " . $conexion->error;
    }
} else {
    echo "No se recibieron los datos necesarios para actualizar la fecha de préstamo.";
}

$conexion->close();
?>
