<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $libroID = $_POST['libro_id'];
    $alumnoID = $_POST['alumno_id'];
    $fechaPrestamo = $_POST['fecha_prestamo'];

    // Validar los datos del formulario
    include('../model/conexion.php');

    // Insertar el préstamo en la base de datos
    $sql = "INSERT INTO libros_prestados (libro_ID, alumno_ID, Fecha_Prestamo) 
            VALUES ('$libroID', '$alumnoID', '$fechaPrestamo')";

    if ($conexion->query($sql) === true) {
        // El préstamo se insertó correctamente
        $conexion->close();
        header("Location: ../views/prestar_libros.php");
        exit;
    } else {
        echo "Error al agregar el préstamo: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>
