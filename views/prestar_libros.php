<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestar Libros</title>
    <link rel="stylesheet" href="../plugin/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>
<body>
<?php include('../templates/cabeza.php'); ?>
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Prestar Libros</span>
    </div>
    <div class="container">
        <a href="../views/agregar_prestamo.php" class="btn btn-dark">Agregar Préstamo</a>
        <hr>
        <table class="table table-dark table-hover" id="tabla">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libro</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Alumno</th>
                    <th scope="col">Matrícula</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Sección</th>
                    <th scope="col">Fecha Préstamo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../model/conexion.php');
                $sql = "SELECT libros_prestados.ID_Prestado, libros.Nombre AS TituloLibro, libros.Autor, 
                        alumnos.Nombre AS NombreAlumno, alumnos.Matricula, alumnos.Semestre, 
                        carreras.Carreras AS NombreCarrera, libros_prestados.Fecha_Prestamo 
                        FROM libros_prestados
                        INNER JOIN libros ON libros_prestados.libro_ID = libros.ID_Libro
                        INNER JOIN alumnos ON libros_prestados.alumno_ID = alumnos.ID_Alumno
                        INNER JOIN carreras ON alumnos.Carrera_ID = carreras.ID_Carrera";
                $resultado = $conexion->query($sql);
                while ($fila = $resultado->fetch_assoc()) {
                    $idPrestamo = $fila['ID_Prestado'];
                ?>
                    <tr>
                        <th scope="row"><?php echo $fila['ID_Prestado'] ?></th>
                        <td><?php echo $fila['TituloLibro'] ?></td>
                        <td><?php echo $fila['Autor'] ?></td>
                        <td><?php echo $fila['NombreAlumno'] ?></td>
                        <td><?php echo $fila['Matricula'] ?></td>
                        <td><?php echo $fila['Semestre'] ?></td>
                        <td><?php echo $fila['NombreCarrera'] ?></td>
                        <td><?php echo $fila['Fecha_Prestamo'] ?></td>
                        <td>
                            <a href="../views/editar_prestamo.php?id=<?php echo $idPrestamo; ?>" class="btn btn-primary" title="Editar"><i class='bx bxs-message-square-edit'></i></a>
                            <a href="../views/devolver_prestamo.php?id=<?php echo $idPrestamo; ?>" class="btn btn-success" title="Devolver"><i class='bx bxs-user-check'></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                "lengthMenu": [3, 5, 10, 20],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron registros",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</section>
<?php include('../templates/pie.php'); ?>
</body>
</html>
