<?php
function agregarPrestamo($conexion, $libroID, $alumnoID, $fechaPrestamo) {
    $sql = "INSERT INTO libros_prestados (libro_ID, alumno_ID, Fecha_Prestamo) VALUES ('$libroID', '$alumnoID', '$fechaPrestamo')";
    return $conexion->query($sql);
}

function obtenerPrestamos($conexion) {
    $sql = "SELECT libros_prestados.ID_Prestado, libros.Nombre AS TituloLibro, libros.Autor, alumnos.Nombre AS NombreAlumno, alumnos.Matricula, alumnos.Semestre, carreras.Carreras AS NombreCarrera, libros_prestados.Fecha_Prestamo 
            FROM libros_prestados
            INNER JOIN libros ON libros_prestados.libro_ID = libros.ID_Libro
            INNER JOIN alumnos ON libros_prestados.alumno_ID = alumnos.ID_Alumno
            INNER JOIN carreras ON alumnos.carrera_ID = carreras.ID_Carrera";
    return $conexion->query($sql);
}

function obtenerPrestamoPorID($conexion, $idPrestamo) {
    $sql = "SELECT libros_prestados.ID_Prestado, libros.Nombre AS TituloLibro, libros.Autor, alumnos.Nombre AS NombreAlumno, CONCAT(alumnos.Apellido1, ' ', alumnos.Apellido2) AS Apellidos, alumnos.Matricula, alumnos.Semestre, carreras.Carreras AS NombreCarrera, libros_prestados.Fecha_Prestamo 
            FROM libros_prestados
            INNER JOIN libros ON libros_prestados.libro_ID = libros.ID_Libro
            INNER JOIN alumnos ON libros_prestados.alumno_ID = alumnos.ID_Alumno
            INNER JOIN carreras ON alumnos.carrera_ID = carreras.ID_Carrera
            WHERE libros_prestados.ID_Prestado = $idPrestamo";
    return $conexion->query($sql);
}

function actualizarPrestamo($conexion, $idPrestamo, $fechaPrestamo) {
    $sql = "UPDATE libros_prestados SET Fecha_Prestamo = '$fechaPrestamo' WHERE ID_Prestado = $idPrestamo";
    return $conexion->query($sql);
}

function eliminarPrestamo($conexion, $idPrestamo) {
    $sql = "DELETE FROM libros_prestados WHERE ID_Prestado = $idPrestamo";
    return $conexion->query($sql);
}

function obtenerLibros($conexion) {
    $sql = "SELECT ID_Libro, Nombre FROM libros";
    return $conexion->query($sql);
}

function obtenerAlumnos($conexion) {
    $sql = "SELECT ID_Alumno, Nombre, Apellido1, Apellido2 FROM alumnos";
    return $conexion->query($sql);
}
?>
