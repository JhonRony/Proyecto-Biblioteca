<?php
include('../controller/eliminar_libro_controller.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Libro</title>
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
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="my-4">Eliminar Libro</h1>
            </div>
            <div class="card-body">
                <?php if (!empty($mensaje)) : ?>
                    <div class="alert alert-info"><?php echo $mensaje; ?></div>
                <?php elseif (isset($libro)) : ?>
                    <form action="../controller/eliminar_libro_controller.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($libro['ID_Libro']); ?>">
                        <p>¿Estás seguro de que quieres eliminar el siguiente libro?</p>
                        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($libro['Nombre']); ?></p>
                        <p><strong>Autor:</strong> <?php echo htmlspecialchars($libro['Autor']); ?></p>
                        <p><strong>Editorial:</strong> <?php echo htmlspecialchars($libro['Editorial']); ?></p>
                        <p><strong>Cantidad:</strong> <?php echo htmlspecialchars($libro['Cantidad']); ?></p>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <a href="libro.php" class="btn btn-secondary">Cancelar</a>
                    </form>
                <?php else: ?>
                    <div class="alert alert-info">No se encontró el libro.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>
