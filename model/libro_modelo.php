<?php
include('conexion.php');

function obtenerLibros($conexion) {
    $sql = "SELECT libros.ID_Libro, libros.Nombre, libros.Autor, categoria.categoria AS NombreCategoria, libros.Editorial, libros.Imagen, libros.Cantidad
            FROM libros
            INNER JOIN categoria ON libros.Categoria_ID = categoria.ID_Categoria";
    $resultado = $conexion->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function obtenerCategorias($conexion) {
    $sql = "SELECT * FROM categoria";
    $resultado = $conexion->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function agregarLibro($conexion, $nombre, $autor, $categoria, $editorial, $imagenData, $cantidad) {
    $sql = "INSERT INTO libros (Nombre, Autor, Categoria_ID, Editorial, Imagen, Cantidad) 
            VALUES ('$nombre', '$autor', '$categoria', '$editorial', '$imagenData', '$cantidad')";
    return $conexion->query($sql);
}

function obtenerLibroPorId($conexion, $id) {
    $sql = "SELECT * FROM libros WHERE ID_Libro = $id";
    $resultado = $conexion->query($sql);
    return $resultado->fetch_assoc();
}

function actualizarLibro($conexion, $id, $nombre, $autor, $categoria, $editorial, $imagenData, $cantidad) {
    if ($imagenData) {
        $sql = "UPDATE libros SET Nombre='$nombre', Autor='$autor', Categoria_ID='$categoria', Editorial='$editorial', Imagen='$imagenData', Cantidad='$cantidad' WHERE ID_Libro='$id'";
    } else {
        $sql = "UPDATE libros SET Nombre='$nombre', Autor='$autor', Categoria_ID='$categoria', Editorial='$editorial', Cantidad='$cantidad' WHERE ID_Libro='$id'";
    }
    return $conexion->query($sql);
}

function eliminarLibro($conexion, $id) {
    $sqlEliminarDependientes = "DELETE FROM libros_prestados WHERE libro_ID='$id'";
    $conexion->query($sqlEliminarDependientes);
    $sqlEliminarLibro = "DELETE FROM libros WHERE ID_Libro='$id'";
    return $conexion->query($sqlEliminarLibro);
}
?>
