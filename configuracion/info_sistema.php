<!---VISTA-->
<?php
// Puedes definir la información de tu software aquí
$nombre_software = "BIBLIOPLUS";
$version = "1.0";
$creadores = array(
    'JHON RONY VARGAS MUÑOZ',
    'ALEXANDER PINEDA CHUQUILLANQUI',
    'RUBEN PARAGUAY HUERTA',
    'ALEX MINA CAMAZCA',
    'MELANY LLANCARI POMA'
);

// Ordenar los creadores alfabéticamente
sort($creadores);

// Otros detalles del sistema
$otros_detalles = "SOFTWARE PARA UNA BUENA GESTION DE LIBROS EN EL COLEGIO VONN NEUMAN - LIRCAY - HUANCAVELICA";
?>

<!---VISTA--->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Información del Sistema</title>
    <style>
        body {
            background-image: url(../views/img/creditosss.jpg);
            background-size: cover;
        }

        .container {
    width: 40%;
    margin: 50px auto;
    padding: 20px;
    background-color: rgba(0, 255, 0, 0.5); /* Cambia el último valor para ajustar la opacidad */
    border: 2px solid green;
    border-radius: 10px;
    text-align: left;
}


        h1 {
            text-align: center; /* Centrar el título */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Información del Sistema</h1>
        <p><strong>Nombre del Software:</strong> <?php echo $nombre_software; ?></p>
        <p><strong>Versión:</strong> <?php echo $version; ?></p>
        <p><strong>Programadores:</strong></p>
        <ol>
            <?php foreach ($creadores as $index => $creador) : ?>
                <li><?php echo $creador; ?></li>
            <?php endforeach; ?>
        </ol>
        <p><?php echo $otros_detalles; ?></p>
    </div>
</body>

</html>

