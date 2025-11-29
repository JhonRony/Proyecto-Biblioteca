<!---VISTA-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias del Sistema</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ajusté la altura para centrar el formulario */
            transition: background-color 0.3s ease; /* Agregué una transición suave para el cambio de color */
            background-color: #fff; /* Establezco el fondo inicial en blanco */
        }

        h1 {
            text-align: center;
            color: #333; /* Cambié el color del título a un tono oscuro */
        }

        .container {
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.8); /* Cambié el color de fondo del contenedor a transparente */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
/*CONTROLADOR*/
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Preferencias del Sistema</h1>

        <?php
        // Aquí puedes procesar datos enviados desde un formulario, por ejemplo
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Procesar datos del formulario y guardar preferencias del usuario
            // Por ejemplo:
            $theme = $_POST["theme"]; // Suponiendo que el formulario tenga un campo "theme" para seleccionar el tema
            // Guardar la preferencia del tema en la base de datos o en una sesión, etc.
            echo "<script>document.body.style.backgroundColor = \"$theme\";</script>";
        }
        ?>

        <form method="post">
            <label for="theme">Selecciona un tema:</label>
            <select name="theme" id="theme">
                <option value="#fff">Tema Claro</option>
                <option value="#222">Tema Oscuro</option> <!-- Cambié el valor a #222 para tema oscuro -->
            </select>
            <button type="submit">Guardar</button>
        </form>
    </div>

    <script>
        // Esta función cambia el color de fondo del body cuando se selecciona una opción diferente en el formulario
        document.getElementById('theme').addEventListener('change', function() {
            document.body.style.backgroundColor = this.value;
        });
    </script>
</body>
</html>


