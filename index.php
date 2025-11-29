<?php
session_start();
include('model/conexion.php'); // MODELO: Incluye el archivo de conexión a la base de datos, donde se maneja la lógica de acceso a datos.

if (!empty($_POST["btningresar"])) { // CONTROLADOR: Maneja la solicitud de inicio de sesión.
    if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $sql = $conexion->query("SELECT * FROM personal WHERE usuario = '$usuario' AND password = '$password'");
        
        if ($datos = $sql->fetch_object()) {
            $_SESSION["ID_Usuario"] = $datos->id;
            $_SESSION["nombre"] = $datos->nombre;
            header('location: ./views/inicio.php'); // CONTROLADOR: Redirige al usuario después de iniciar sesión correctamente.
            exit();
        } else {
            echo "<div class='alert alert-danger text-center'>USUARIO Y CONTRASEÑA INCORRECTA</div>"; // VISTA: Muestra un mensaje de error al usuario.
        }
    } else {
        echo "<div class='alert alert-danger text-center'>EL USUARIO NO EXISTE</div>"; // VISTA: Muestra un mensaje de error al usuario.
    }
}

if (!empty($_POST["btnregistrar"])) { // CONTROLADOR: Maneja la solicitud de registro de un nuevo usuario.
    if (!empty($_POST["nuevo_usuario"]) && !empty($_POST["nuevo_password"]) && !empty($_POST["nombre"])) {
        $nuevo_usuario = $_POST["nuevo_usuario"];
        $nuevo_password = $_POST["nuevo_password"];
        $nombre = $_POST["nombre"];

        if (filter_var($nuevo_usuario, FILTER_VALIDATE_EMAIL)) { // Verifica si el usuario es un correo válido.
            $sql_check = $conexion->query("SELECT * FROM personal WHERE usuario = '$nuevo_usuario'");
            if ($sql_check->num_rows == 0) {
                $sql_insert = $conexion->query("INSERT INTO personal (usuario, password, nombre) VALUES ('$nuevo_usuario', '$nuevo_password', '$nombre')");
                if ($sql_insert) {
                    echo "<div class='alert alert-success text-center'>Usuario registrado con éxito</div>"; // VISTA: Muestra un mensaje de éxito al usuario.
                } else {
                    echo "<div class='alert alert-danger text-center'>Error al registrar usuario</div>"; // VISTA: Muestra un mensaje de error al usuario.
                }
            } else {
                echo "<div class='alert alert-danger text-center'>El usuario ya existe</div>"; // VISTA: Muestra un mensaje de error al usuario.
            }
        } else {
            echo "<div class='alert alert-danger text-center'>Ingrese un correo válido</div>"; // VISTA: Muestra un mensaje de error al usuario.
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Rellene todos los campos</div>"; // VISTA: Muestra un mensaje de error al usuario.
    }
}

$conexion->close(); // MODELO: Cierra la conexión a la base de datos.
?>

<!----VISTA---->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de registro</title>
    <link rel="stylesheet" href="./login/estilo.css">
    <link rel="stylesheet" href="./plugin/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('login/img/FONDOLOGIN.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
        }
        .loginbox {
            width: 350px;
            height: auto;
            position: absolute;
            top: 65%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.5);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: block;
            margin: -60px auto 10px -15px;
            background-size: cover;
            background-position: center top;
        }
        .dropdown {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }
        .dropdown-menu {
            min-width: 250px;
            padding: 20px;
        }
        .btn-primary:active {
            background-color: #0056b3 !important;
            border-color: #0056b3 !important;
        }
        .loginbox p {
            color: white;
            text-align: center;
            font-weight: bold;
        }
        .dropdown-menu p {
            text-align: center;
        }
        .dropdown-menu h4 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 loginbox">
                <img src="login/img/VONN.jpg" alt="Avatar" class="avatar">
                <h4 class="text-center text-white">INICIO DE SESION</h4>
                <form action="" method="post">
                    <p>Usuario</p>
                    <input type="text" placeholder="Ingrese su Usuario" name="usuario" class="form-control" style="border-radius: 10px; border: 2px solid #000; padding: 10px; background-color: #fff; color: #000;">
                    <p>Contraseña</p>
                    <input type="password" placeholder="Ingrese su Contraseña" name="password" class="form-control" style="border-radius: 10px; border: 2px solid #000; padding: 10px; background-color: #fff; color: #000;">
                    <div class="text-center">
                        <input type="submit" value="INGRESAR" name="btningresar" class="btn btn-primary mt-3">
                    </div>
                </form>
                <div style="background-color: #28a745; border-radius: 10px; padding: 10px; text-align: center; margin-top: 20px;">
                    <p style="color: white; margin-bottom: 0;">RELLENAR TODOS LOS CAMPOS OBLIGATORIO</p>
                </div>
            </div>
        </div>
    </div>

    <!-- VISTA -->
    <!-- Botón Desplegable para Registrar Nuevo Usuario -->
    <div class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left: -10px;">
            <i class="bi bi-person-plus-fill"></i> Registrar Nuevo Usuario
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <h4 class="text-center text-primary">REGISTRAR NUEVO USUARIO</h4>
            <form action="" method="post">
                <p>Nombre</p>
                <div class="border border-dark rounded">
                    <input type="text" placeholder="Ingrese su Nombre" name="nombre" class="form-control">
                </div>
                <p>Usuario</p>
                <div class="border border-dark rounded">
                    <input type="text" placeholder="Ingrese un Usuario" name="nuevo_usuario" class="form-control">
                </div>
                <p>Contraseña</p>
                <div class="border border-dark rounded">
                    <input type="password" placeholder="Contraseña" name="nuevo_password" class="form-control">
                </div>
                <div class="text-center">
                    <input type="submit" value="REGISTRAR" name="btnregistrar" class="btn btn-success mt-3">
                </div>
            </form>
        </div>
    </div>

    <script src="./plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
