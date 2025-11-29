<?php
include('../controller/eliminar_alumno_controller.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Alumno</title>
    <link rel="stylesheet" href="../fontawesome/css/all.css" />
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
            transform-style: preserve-3d;
            background-color: #212529;
            color: #ffffff;
        }
        .card-header {
            background-color: #343a40;
            border-bottom: 1px solid rgba(255, 255, 255, 0.125);
            color: #ffffff;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h1 class="my-4">Eliminar Alumno</h1>
                    </div>
                    <div class="card-body">
                        <p>¿Estás seguro de que deseas eliminar al siguiente alumno?</p>
                        <h3><?php echo htmlspecialchars($nombreAlumno); ?></h3>
                        <form action="../controller/eliminar_alumno_controller.php" method="POST">
                            <input type="hidden" name="alumno_id" value="<?php echo htmlspecialchars($alumnoID); ?>">
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                <a href="alumno.php" class="btn btn-primary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
