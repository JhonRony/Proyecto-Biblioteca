<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Categoria</title>
    <link rel="stylesheet" href="../plugin/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <h1 class="text-center">Agregar Categoria</h1>

            <form action="../controller/agregar_categoria_controller.php" method="POST">
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="categoria.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
