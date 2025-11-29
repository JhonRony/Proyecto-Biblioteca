<?php
function obtenerAlumnos($conexion) {
    $sql = "SELECT alumnos.ID_Alumno, alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, alumnos.Matricula, alumnos.Semestre, carreras.Carreras AS NombreCarrera
            FROM alumnos
            INNER JOIN carreras ON alumnos.Carrera_ID = carreras.ID_Carrera";
    $resultado = $conexion->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function agregarAlumno($conexion, $nombre, $apellido1, $apellido2, $matricula, $semestre, $carrera) {
    $sql = "INSERT INTO alumnos (Nombre, Apellido1, Apellido2, Matricula, Semestre, Carrera_ID) 
            VALUES ('$nombre', '$apellido1', '$apellido2', '$matricula', '$semestre', '$carrera')";
    $conexion->query($sql);
}

function obtenerAlumnoPorId($conexion, $idAlumno) {
    $sql = "SELECT alumnos.*, carreras.Carreras AS NombreCarrera 
            FROM alumnos 
            INNER JOIN carreras ON alumnos.Carrera_ID = carreras.ID_Carrera 
            WHERE ID_Alumno = $idAlumno";
    $resultado = $conexion->query($sql);
    return $resultado->fetch_assoc();
}

function obtenerCarreras($conexion) {
    $sql = "SELECT * FROM carreras";
    $resultado = $conexion->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function editarAlumno($conexion, $idAlumno, $nombre, $apellido1, $apellido2, $matricula, $semestre, $carreraID) {
    $sql = "UPDATE alumnos SET Nombre = '$nombre', Apellido1 = '$apellido1', Apellido2 = '$apellido2', Matricula = '$matricula', Semestre = '$semestre', Carrera_ID = $carreraID WHERE ID_Alumno = $idAlumno";
    $conexion->query($sql);
}

function eliminarAlumno($conexion, $alumnoID) {
    $sqlEliminar = "DELETE FROM alumnos WHERE ID_Alumno = '$alumnoID'";
    $conexion->query($sqlEliminar);
}

function obtenerNombreAlumno($conexion, $alumnoID) {
    $sqlNombre = "SELECT Nombre FROM alumnos WHERE ID_Alumno = '$alumnoID'";
    $resultadoNombre = $conexion->query($sqlNombre);
    $filaNombre = $resultadoNombre->fetch_assoc();
    return $filaNombre['Nombre'];
}
?>
