<?php
include('../controller/editar_libro_controller.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
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
    <script>
        function mostrarVistaPrevia() {
            var archivo = document.getElementById('imagen').files[0];
            var vistaPrevia = document.getElementById('imagen-preview');

            var lector = new FileReader();

            lector.onloadend = function () {
                vistaPrevia.src = lector.result;
            }

            if (archivo) {
                lector.readAsDataURL(archivo);
            } else {
                vistaPrevia.src = "";
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="my-4">Editar Libro</h1>
            </div>
            <div class="card-body">
                <?php if (!empty($mensaje)) : ?>
                    <div class="alert alert-info"><?php echo $mensaje; ?></div>
                <?php endif; ?>
                <?php if (isset($libro)) : ?>
                    <form action="../controller/editar_libro_controller.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($libro['ID_Libro']); ?>">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($libro['Nombre']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="autor" class="form-label">Autor:</label>
                            <input type="text" class="form-control" id="autor" name="autor" value="<?php echo htmlspecialchars($libro['Autor']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría:</label>
                            <select class="form-select" id="categoria" name="categoria" required>
                                <option value="" selected disabled>Elija una Categoría</option>
                                <?php foreach ($categorias as $filaCategoria) : ?>
                                    <option value="<?php echo htmlspecialchars($filaCategoria['ID_Categoria']); ?>" <?php if ($filaCategoria['ID_Categoria'] == $libro['Categoria_ID']) echo "selected"; ?>><?php echo htmlspecialchars($filaCategoria['categoria']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editorial" class="form-label">Editorial:</label>
                            <input type="text" class="form-control" id="editorial" name="editorial" value="<?php echo htmlspecialchars($libro['Editorial']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen:</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/jpeg, image/png" onchange="mostrarVistaPrevia()">
                            <img id="imagen-preview" src="data:image/jpeg;base64,<?php echo base64_encode($libro['Imagen']); ?>" alt="Preview">
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($libro['Cantidad']); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="libro.php" class="btn btn-danger">Cancelar</a>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
