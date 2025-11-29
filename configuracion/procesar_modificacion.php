<?php
session_start();
include('../model/conexion.php');

// Establecer usuario de prueba en la sesión (asegúrate de quitar esto en producción)
$_SESSION["usuario"] = "carmen@gmail.com";

// Función para verificar la contraseña actual y actualizarla
function modificarContraseña($current_password, $new_password, $confirm_password) {
    global $conexion;

    // Validar que las contraseñas nuevas coincidan
    if ($new_password != $confirm_password) {
        return "LAS NUEVAS CONTRASEÑAS NO COINCIDEN, INTENTALO NUEVAMENTE.";
    }

    // Validar que la contraseña actual sea correcta
    $username = $_SESSION["usuario"]; // Usar la sesión del usuario actual
    $sql = $conexion->query("SELECT password FROM personal WHERE usuario='$username'");
    if ($sql->num_rows > 0) {
        $row = $sql->fetch_assoc();
        $stored_password = $row['password'];

        // Comparar la contraseña actual con la almacenada (texto plano)
        if ($current_password == $stored_password) {
            // Actualizar la contraseña en la base de datos
            $update_sql = $conexion->query("UPDATE personal SET password='$new_password' WHERE usuario='$username'");
            if ($update_sql) {
                return "CONTRASEÑA ACTUALIZADA CORRECTAMENTE.";
            } else {
                return "ERRROR AL ACTUALIZAR LA CONTRASEÑA: " . $conexion->error;
            }
        } else {
            return "LA CONTRASEÑA ACTUAL ES INCORRECTA, INTENTALO DE NUEVO.";
        }
    } else {
        return "USUARIO NO ENCONTRADO.";
    }
}

// Inicializa el resultado
$resultado = "";

// Procesar formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Llamar a la función para modificar la contraseña
    $resultado = modificarContraseña($current_password, $new_password, $confirm_password);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #7e7b52;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #1034A6;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 0 10px #87CEEB;
            max-width: 600px; /* Cambiar width por max-width para que sea responsive */
            width: 100%; /* Asegurar que ocupe todo el ancho disponible */
            box-sizing: border-box; /* Incluir padding y borde dentro del ancho especificado */
            text-align: center; /* Centrar el contenido dentro del contenedor */
            margin: auto; /* Centrar el contenedor */
        }

        h2 {
            text-align: center;
            color: #000000;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
            color: #555;
            position: relative;
            display: flex;
            align-items: center;
        }
        input[type="password"] {
            padding: 8px 30px 8px 8px; /* Ajustar el padding para espacio del ícono */
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            position: relative;
        }
        .show-password {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 8px;
            cursor: pointer;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px; /* Ajustar el padding para espacio interior */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 150px; /* Ancho del botón */
            height: 50px; /* Alto del botón */
            display: block; /* Para que ocupe el ancho del contenedor */
            margin: 0 auto; /* Centrar horizontalmente */
        }

        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 16px;
            text-align: center;
        }
        .error {
            color: #f44336;
        }
        .success {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>MODIFICAR CONTRASEÑA</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="current_password" class="password-message">
            <?php echo ($resultado == "La contraseña actual es incorrecta. Inténtalo de nuevo." ? "<span class='error'>{$resultado}</span>" : "<span style='color: #000000;'>CONTRASEÑA ACTUAL:</span>"); ?>
                <input type="password" id="current_password" name="current_password" required>
                <span class="show-password" onclick="togglePasswordVisibility('current_password')">👁️‍🗨️</span>
            </label>

            <label for="new_password">
                <?php echo ($resultado == "Las nuevas contraseñas no coinciden. Inténtalo de nuevo." ? "<span class='error'>$resultado</span>" : "<span style='color: #000000;'>CONTRASEÑA NUEVA:</span>"); ?>
                <input type="password" id="new_password" name="new_password" required>
                <span class="show-password" onclick="togglePasswordVisibility('new_password')">👁️‍🗨️</span>
            </label>

            <label for="confirm_password">
                <?php echo ($resultado == "Las nuevas contraseñas no coinciden. Inténtalo de nuevo." ? "<span class='error'>$resultado</span>" : "<span style='color: #000000;'>CONFIRMAR CONTRASEÑA:</span>"); ?>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <span class="show-password" onclick="togglePasswordVisibility('confirm_password')">👁️‍🗨️</span>
            </label>

            <button type="submit">MODIFICAR CONTRASEÑA</button>
        </form>

        <div class="result <?php echo ($resultado == "" ? "" : (strpos($resultado, "Error") !== false ? "error" : "success")); ?>">
            <?php echo $resultado; ?>
        </div>
    </div>

    <script>
        // Función para mostrar/ocultar contraseña
        function togglePasswordVisibility(inputId) {
            var input = document.getElementById(inputId);
            var icon = input.nextElementSibling;

            if (input.type === "password") {
                input.type = "text";
                icon.innerText = "👁️";
            } else {
                input.type = "password";
                icon.innerText = "👁️‍🗨️";
            }
        }
    </script>
</body>
</html>
