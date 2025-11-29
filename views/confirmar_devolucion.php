<?php
include('../model/conexion.php');

// Verificar si se recibió el ID del préstamo
if (isset($_POST['id_prestamo'])) {
    $idPrestamo = $_POST['id_prestamo'];

    // Eliminar el registro de préstamo de la base de datos
    $sql = "DELETE FROM libros_prestados WHERE ID_Prestado = $idPrestamo";
    if ($conexion->query($sql) === TRUE) {
        $mensaje = "Devolución de libro exitosa.";
        $redireccion = "../views/prestar_libros.php";
    } else {
        $mensaje = "Error al registrar la devolución del libro: " . $conexion->error;
        $redireccion = "../views/prestar_libros.php";
    }
} else {
    $mensaje = "No se recibió el ID del préstamo.";
    $redireccion = "../views/prestar_libros.php";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Devolución de Libro</title>
    <link rel="stylesheet" href="../plugin/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card" style="width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-center">Confirmar Devolución de Libro</h5>
                <p class="text-center"><?php echo $mensaje; ?></p>
                <div class="text-center">
                    <a href="<?php echo $redireccion; ?>" class="btn btn-primary">Aceptar</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        alert("<?php echo $mensaje; ?>");
        window.location.href = "<?php echo $redireccion; ?>";
    </script>
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
