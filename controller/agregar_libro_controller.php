<?php
include('../model/libro_modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $autor = mysqli_real_escape_string($conexion, $_POST['autor']);
    $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
    $editorial = mysqli_real_escape_string($conexion, $_POST['editorial']);
    $imagen = $_FILES['imagen']['tmp_name'];
    $cantidad = mysqli_real_escape_string($conexion, $_POST['cantidad']);

    if (isset($imagen) && !empty($imagen)) {
        $imagenData = file_get_contents($imagen);
        $imagenData = mysqli_real_escape_string($conexion, $imagenData);

        if (agregarLibro($conexion, $nombre, $autor, $categoria, $editorial, $imagenData, $cantidad)) {
            header("Location: ../views/libro.php");
            exit;
        } else {
            $mensaje = "Error al guardar el libro: " . $conexion->error;
        }
    } else {
        $mensaje = "Debe seleccionar una imagen";
    }
}
?>
