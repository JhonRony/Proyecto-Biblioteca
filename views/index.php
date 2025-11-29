<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de registro</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="../../plugin/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 loginbox">
                <img src="VONN.jpg" alt="Avatar" class="avatar">
                <h4 class="text-center text-white">INICIO DE SESION</h4>
                <form action="../../controllers/AuthController.php" method="post">
                    <p>Usuario</p>
                    <input type="text" placeholder="Ingrese su Usuario" name="usuario" class="form-control">
                    <p>Contraseña</p>
                    <input type="password" placeholder="Ingrese su Contraseña" name="password" class="form-control">
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
    <div class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-plus-fill"></i> Registrar Nuevo Usuario
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <h4 class="text-center text-primary">REGISTRAR NUEVO USUARIO</h4>
            <form action="../../controllers/AuthController.php" method="post">
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
    <script src="../../plugin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
