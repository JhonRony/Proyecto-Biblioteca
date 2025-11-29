<?php
include('../model/libro_modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (eliminarLibro($conexion, $id)) {
        header("Location: ../views/libro.php");
        exit();
    } else {
        $mensaje = "Error al eliminar el libro: " . $conexion->error;
    }
} else {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $libro = obtenerLibroPorId($conexion, $id);
        if (!$libro) {
            $mensaje = "ID de libro no válido";
        }
    } else {
        $mensaje = "ID de libro no válido";
    }
}
?>
