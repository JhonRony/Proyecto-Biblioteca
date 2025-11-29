<?php
include('../model/conexion.php');

if (isset($_POST['id_prestamo'])) {
    $idPrestamo = $_POST['id_prestamo'];

    $sql = "DELETE FROM libros_prestados WHERE ID_Prestado = $idPrestamo";
    if ($conexion->query($sql) === TRUE) {
        $conexion->close();
        header("Location: ../views/prestar_libros.php");
        exit();
    } else {
        echo "Error al registrar la devolución del libro: " . $conexion->error;
    }
} else {
    echo "No se recibió el ID del préstamo.";
}

$conexion->close();
?>
