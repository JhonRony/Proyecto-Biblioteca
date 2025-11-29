<?php
include('../model/conexion.php');
include('../model/categoria_modelo.php');

if (isset($_GET['id'])) {
    $idCategoria = $_GET['id'];
    $categoria = obtenerCategoriaPorId($conexion, $idCategoria);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
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

        .form-group label {
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
            <h1 class="text-center">Editar Categoría</h1>
            <br>
            <form action="../controller/editar_categoria_controller.php" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($idCategoria); ?>">
                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo htmlspecialchars($categoria['categoria']); ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="categoria.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
