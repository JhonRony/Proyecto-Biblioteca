<?php
include('../controller/agregar_libro_controller.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <link rel="stylesheet" href="../plugin/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #343a40;
        }

        .card {
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            background-color: #212529;
            color: #ffffff;
        }

        .card-header {
            background-color: #343a40;
            border-bottom: 1px solid rgba(255, 255, 255, 0.125);
            color: #ffffff;
        }

        .form-label {
            color: #ffffff;
        }

        #imagen-preview {
            max-width: 200px;
            max-height: 200px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="my-4">Agregar Libro</h1>
            </div>
            <div class="card-body">
                <?php if (!empty($mensaje)) : ?>
                    <div class="alert alert-info"><?php echo $mensaje; ?></div>
                <?php endif; ?>
                <form action="../controller/agregar_libro_controller.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor:</label>
                        <input type="text" class="form-control" id="autor" name="autor" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría:</label>
                        <select class="form-select" id="categoria" name="categoria" required>
                            <option value="" selected disabled>Elija una Categoría</option>
                            <?php $categorias = obtenerCategorias($conexion); ?>
                            <?php foreach ($categorias as $filaCategoria) : ?>
                                <option value="<?php echo htmlspecialchars($filaCategoria['ID_Categoria']); ?>"><?php echo htmlspecialchars($filaCategoria['categoria']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editorial" class="form-label">Editorial:</label>
                        <input type="text" class="form-control" id="editorial" name="editorial" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen:</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/jpeg, image/png" required onchange="previewImagen(event)">
                        <img id="imagen-preview" src="#" alt="Preview">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad:</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="libro.php" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImagen(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var imgElement = document.getElementById("imagen-preview");
                imgElement.src = reader.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    </script>
</body>

</html>
