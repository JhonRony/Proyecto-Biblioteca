<?php
include('../model/conexion.php');
include('../model/categoria_modelo.php');

if (isset($_GET['id'])) {
    $idCategoria = $_GET['id'];
    $categoria = obtenerCategoriaPorId($conexion, $idCategoria);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (eliminarCategoria($conexion, $idCategoria)) {
        echo "<script>window.location.href = 'categoria.php';</script>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error al eliminar la categoría: " . $conexion->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Categoría</title>
    <link rel="stylesheet" href="../plugin/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #333;
            color: #fff;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border: none;
            background-color: #444;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            color: #fff;
        }

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

        .alert-info {
            color: #fff;
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="text-center">Eliminar Categoría</h1>
            <br>
            <p class="text-center">¿Estás seguro de que deseas eliminar la categoría "<?php echo htmlspecialchars($categoria['categoria']); ?>"?</p>
            <div class="text-center">
                <form action="" method="POST" style="display: inline-block;">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                <a href="categoria.php" class="btn btn-primary">Cancelar</a>
            </div>
        </div>
    </div>
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
