<?php
include('conexion.php');

function obtenerCategorias($conexion) {
    $query = "SELECT ID_Categoria, categoria FROM categoria";
    $resultado = $conexion->query($query);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function categoriaExiste($conexion, $categoria) {
    $categoriaExistente = mysqli_real_escape_string($conexion, $categoria);
    $query = "SELECT categoria FROM categoria WHERE LOWER(categoria) LIKE LOWER('$categoriaExistente%')";
    $resultado = $conexion->query($query);
    return $resultado->num_rows > 0;
}

function agregarCategoria($conexion, $categoria) {
    $categoriaExistente = mysqli_real_escape_string($conexion, $categoria);
    $sql = "INSERT INTO categoria (categoria) VALUES ('$categoriaExistente')";
    return $conexion->query($sql);
}

function obtenerCategoriaPorId($conexion, $id) {
    $query = "SELECT * FROM categoria WHERE ID_Categoria = $id";
    $resultado = $conexion->query($query);
    return $resultado->fetch_assoc();
}

function actualizarCategoria($conexion, $id, $categoria) {
    $categoriaExistente = mysqli_real_escape_string($conexion, $categoria);
    $sql = "UPDATE categoria SET categoria = '$categoriaExistente' WHERE ID_Categoria = $id";
    return $conexion->query($sql);
}

function eliminarCategoria($conexion, $id) {
    $sql = "DELETE FROM categoria WHERE ID_Categoria = $id";
    return $conexion->query($sql);
}
?>
