<?php
include('../model/conexion.php');
include('../model/alumno_modelo.php');

if (isset($_GET['id'])) {
    $idAlumno = $_GET['id'];
    $alumno = obtenerAlumnoPorId($conexion, $idAlumno);
    $carreras = obtenerCarreras($conexion);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
} else {
    header("Location: ../views/alumno.php");
    exit();
}
?>
