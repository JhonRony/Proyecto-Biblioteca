<?php
include('../model/categoria_modelo.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (eliminarCategoria($conexion, $id)) {
        echo "<script>window.location.href='../views/categoria.php'</script>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error al eliminar la Categoria " . $conexion->error . "</div>";
    }
}
?>
