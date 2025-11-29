<?php
include('../model/conexion.php');
include('../model/alumno_modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAlumno = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $matricula = $_POST['matricula'];
    $semestre = $_POST['semestre'];
    $carreraID = $_POST['carrera'];

    editarAlumno($conexion, $idAlumno, $nombre, $apellido1, $apellido2, $matricula, $semestre, $carreraID);
    header("Location: ../views/alumno.php");
    exit();
}

if (isset($_GET['id'])) {
    $idAlumno = $_GET['id'];
    $alumno = obtenerAlumnoPorId($conexion, $idAlumno);
    if (!$alumno) {
        header("Location: ../views/alumno.php");
        exit();
    }
} else {
    header("Location: ../views/alumno.php");
    exit();
}

$carreras = obtenerCarreras($conexion);
?>
