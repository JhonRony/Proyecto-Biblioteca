<?php
include('../model/conexion.php');
include('../model/categoria_modelo.php');
$categorias = obtenerCategorias($conexion);
?>

<!-- VISTA -->
<?php include('../templates/cabeza.php'); ?>

<!-- VISTA -->
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Categoria</span>
    </div>
    <div class="container">
        <a href="agregar_categoria.php" class="btn btn-dark">Agregar Categoría</a>
        <hr>
        <table class="table table-dark table-hover" id="tabla">
            <thead>
                <tr>
                    <th scope="col">ID_Categoria</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- MODELO -->
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?= htmlspecialchars($categoria['ID_Categoria']) ?></td>
                        <td><?= htmlspecialchars($categoria['categoria']) ?></td>
                        <td>
                            <!-- VISTA -->
                            <a href="editar_categoria.php?id=<?= htmlspecialchars($categoria['ID_Categoria']) ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <!-- VISTA -->
                            <a href="eliminar_categoria.php?id=<?= htmlspecialchars($categoria['ID_Categoria']) ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
    <!-- MODELO -->
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</section>

<!-- VISTA -->
<?php include('../templates/pie.php'); ?>
