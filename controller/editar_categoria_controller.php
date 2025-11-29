<?php
include('../model/categoria_modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $categoria = trim($_POST['categoria']);
    
    if (actualizarCategoria($conexion, $id, $categoria)) {
        echo "<script>window.location.href='../views/categoria.php'</script>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error al actualizar la Categoria " . $conexion->error . "</div>";
    }
} else {
    if (isset($_GET['id'])) {
        $idCategoria = $_GET['id'];
        $categoria = obtenerCategoriaPorId($conexion, $idCategoria);
    }
}
?>
