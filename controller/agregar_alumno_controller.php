<?php
include('../model/conexion.php');
include('../model/alumno_modelo.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $matricula = $_POST['matricula'];
    $semestre = $_POST['semestre'];
    $carrera = $_POST['carrera'];

    agregarAlumno($conexion, $nombre, $apellido1, $apellido2, $matricula, $semestre, $carrera);
    header("Location: ../views/alumno.php");
    exit();
}

$carreras = obtenerCarreras($conexion);
?>
