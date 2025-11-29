<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Préstamo de Libro</title>
    <link rel="stylesheet" href="../plugin/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 60px; /* Agregar margen superior */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card" style="width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-center">EDITAR PRÉSTAMO DE LIBRO</h5>
                <?php
                include('../model/conexion.php');
                if (isset($_GET['id'])) {
                    $idPrestamo = $_GET['id'];
                    $sql = "SELECT libros_prestados.ID_Prestado, libros.Nombre AS TituloLibro, libros.Autor, 
                            alumnos.Nombre AS NombreAlumno, CONCAT(alumnos.Apellido1, ' ', alumnos.Apellido2) AS Apellidos, 
                            alumnos.Matricula, alumnos.Semestre, carreras.Carreras AS NombreCarrera, 
                            libros_prestados.Fecha_Prestamo 
                            FROM libros_prestados
                            INNER JOIN libros ON libros_prestados.libro_ID = libros.ID_Libro
                            INNER JOIN alumnos ON libros_prestados.alumno_ID = alumnos.ID_Alumno
                            INNER JOIN carreras ON alumnos.Carrera_ID = carreras.ID_Carrera
                            WHERE libros_prestados.ID_Prestado = $idPrestamo";
                    $resultado = $conexion->query($sql);
                    if ($resultado->num_rows == 1) {
                        $fila = $resultado->fetch_assoc();
                ?>
                        <form action="../controller/actualizar_prestamo_controller.php" method="POST">
                            <input type="hidden" name="id_prestamo" value="<?php echo $fila['ID_Prestado']; ?>">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título del Libro</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $fila['TituloLibro']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="autor" class="form-label">Autor</label>
                                <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $fila['Autor']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="alumno" class="form-label">Nombre del Alumno</label>
                                <input type="text" class="form-control" id="alumno" name="alumno" value="<?php echo $fila['NombreAlumno']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellidos del Alumno</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $fila['Apellidos']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="matricula" class="form-label">DNI del Alumno</label>
                                <input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo $fila['Matricula']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="semestre" class="form-label">Grado del Alumno</label>
                                <input type="text" class="form-control" id="semestre" name="semestre" value="<?php echo $fila['Semestre']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="carrera" class="form-label">Sección del Alumno</label>
                                <input type="text" class="form-control" id="carrera" name="carrera" value="<?php echo $fila['NombreCarrera']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_prestamo" class="form-label">Fecha de Préstamo</label>
                                <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" value="<?php echo $fila['Fecha_Prestamo']; ?>" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="../views/prestar_libros.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                <?php
                    } else {
                        echo "<p class='text-center'>No se encontró el préstamo de libros.</p>";
                    }
                    $resultado->free();
                } else {
                    echo "<p class='text-center'>No se especificó el ID del préstamo.</p>";
                }
                $conexion->close();
                ?>
            </div>
        </div>
    </div>
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
