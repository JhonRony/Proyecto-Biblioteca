<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Préstamo</title>
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
        <br>
        <div class="card">
            <div class="card-body">
                <center>
                    <h1>Agregar Préstamo</h1>
                </center>
                <br>
                <form method="POST" action="../controller/agregar_prestamo_controller.php">
                    <div class="mb-3">
                        <label for="libro_id" class="form-label">Nombre del Libro:</label>
                        <select class="form-select" id="libro_id" name="libro_id" required>
                            <option value="">Seleccione un libro</option>
                            <?php
                            include('../model/conexion.php');
                            $sql = "SELECT ID_Libro, Nombre FROM libros";
                            $result = $conexion->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=\"{$row['ID_Libro']}\">{$row['Nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alumno_id" class="form-label">Datos del Alumno:</label>
                        <select class="form-select" id="alumno_id" name="alumno_id" required>
                            <option value="">Seleccione un alumno</option>
                            <?php
                            $sql = "SELECT ID_Alumno, Nombre, Apellido1, Apellido2 FROM alumnos";
                            $result = $conexion->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $nombreCompleto = "{$row['Nombre']} {$row['Apellido1']} {$row['Apellido2']}";
                                echo "<option value=\"{$row['ID_Alumno']}\">$nombreCompleto</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_prestamo" class="form-label">Fecha del Préstamo:</label>
                        <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Préstamo</button>
                    <a href="../views/prestar_libros.php" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
