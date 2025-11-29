<?php include('../templates/cabeza.php'); ?>
<style>
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    table.dataTable thead th {
        color: #fff;
        background-color: #212529;
        border-color: #32383e;
    }
    table.dataTable tbody td {
        border-color: #32383e;
    }
</style>
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Ingresar Alumno</span>
    </div>
    <div class="container">
        <a href="agregar_alumno.php" class="btn btn-dark mb-3">Agregar Alumno</a>
        <table class="table table-dark table-hover" id="tabla">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Sección</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../controller/alumno_controller.php');
                foreach ($alumnos as $fila) {
                    $idAlumno = $fila['ID_Alumno'];
                ?>
                    <tr>
                        <th scope="row"><?php echo $fila['ID_Alumno']; ?></th>
                        <td><?php echo $fila['Nombre']; ?></td>
                        <td><?php echo $fila['Apellido1']; ?></td>
                        <td><?php echo $fila['Apellido2']; ?></td>
                        <td><?php echo $fila['Matricula']; ?></td>
                        <td><?php echo $fila['Semestre']; ?></td>
                        <td><?php echo $fila['NombreCarrera']; ?></td>
                        <td>
                            <a href="editar_alumno.php?id=<?php echo $idAlumno; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="eliminar_alumno.php?id=<?php echo $idAlumno; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="../plugin/jquery/dist/jquery.min.js"></script>
    <script src="../plugin/jquery.dataTables.min.js"></script>
    <script src="../plugin/dataTables.bootstrap5.min.js"></script>
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
