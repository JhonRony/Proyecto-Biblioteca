<?php
include('../model/conexion.php');
include('../model/alumno_modelo.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumnoID = $_POST['alumno_id'];
    eliminarAlumno($conexion, $alumnoID);
    header("Location: ../views/alumno.php");
    exit();
}

if (isset($_GET['id'])) {
    $alumnoID = $_GET['id'];
    $nombreAlumno = obtenerNombreAlumno($conexion, $alumnoID);
} else {
    header("Location: ../views/alumno.php");
    exit();
}
?>
