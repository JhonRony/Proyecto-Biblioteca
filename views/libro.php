<?php 
include('../model/conexion.php');
include('../model/libro_modelo.php');
$libros = obtenerLibros($conexion);
?>

<!-- VISTA -->
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

<!-- el span es para todos los encabezados -->
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Ingresar Libros Nuevos</span>
    </div>

    <div class="container">
        <a href="agregar_libro.php" class="btn btn-dark mb-3">Agregar Libro</a>
        <table class="table table-dark table-hover" id="tabla">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                    <tr>
                        <th scope="row"><?= htmlspecialchars($libro['ID_Libro']) ?></th>
                        <td><?= htmlspecialchars($libro['Nombre']) ?></td>
                        <td><?= htmlspecialchars($libro['Autor']) ?></td>
                        <td><?= htmlspecialchars($libro['NombreCategoria']) ?></td>
                        <td><?= htmlspecialchars($libro['Editorial']) ?></td>
                        <td><img src="data:image/jpeg;base64,<?= base64_encode($libro['Imagen']) ?>" width="50px"></td>
                        <td><?= htmlspecialchars($libro['Cantidad']) ?></td>
                        <td>
                            <a href="editar_libro.php?id=<?= htmlspecialchars($libro['ID_Libro']) ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="eliminar_libro.php?id=<?= htmlspecialchars($libro['ID_Libro']) ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
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
