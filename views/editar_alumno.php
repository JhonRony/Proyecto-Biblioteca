<?php
include('../controller/editar_alumno_controller.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
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
        .form-label {
            color: #ffffff;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5c636a;
            border-color: #5c636a;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="my-4 text-center">Editar Alumno</h1>
            </div>
            <div class="card-body">
                <form action="../controller/editar_alumno_controller.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($alumno['ID_Alumno']); ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($alumno['Nombre']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido1" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellido1" name="apellido1" value="<?php echo htmlspecialchars($alumno['Apellido1']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido2" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo htmlspecialchars($alumno['Apellido2']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="matricula" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo htmlspecialchars($alumno['Matricula']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="semestre" class="form-label">Grado</label>
                        <input type="text" class="form-control" id="semestre" name="semestre" value="<?php echo htmlspecialchars($alumno['Semestre']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="carrera" class="form-label">Sección</label>
                        <select class="form-select" id="carrera" name="carrera" required>
                            <?php foreach ($carreras as $carrera) : ?>
                                <option value="<?php echo htmlspecialchars($carrera['ID_Carrera']); ?>" <?php if ($carrera['ID_Carrera'] == $alumno['Carrera_ID']) echo 'selected'; ?>><?php echo htmlspecialchars($carrera['Carreras']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="editar">Guardar Cambios</button>
                        <a href="alumno.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
