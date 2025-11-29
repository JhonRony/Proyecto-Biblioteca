<!---CONTROLADOR--->
<?php
include('../model/conexion.php');

if (!empty($_POST["btnregistrar"])) {

    if (!empty($_POST["nombre"]) && !empty($_POST["usuario"]) && !empty($_POST["password"])) {
        
        $nombre = $_POST["nombre"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $sql = $conexion->query("INSERT INTO personal (nombre, usuario, password) VALUES ('$nombre', '$usuario', '$password')");

        if ($sql) {
            echo "<div class='alert alert-success text-center'>Usuario registrado exitosamente</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Error al registrar usuario</div>";
        }
        
    } else {
        echo "<div class='alert alert-warning text-center'>Todos los campos son obligatorios</div>";
    }

    $conexion->close();
}
?>
