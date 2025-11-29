<?php
include('../model/categoria_modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = trim($_POST['categoria']);
    
    if (categoriaExiste($conexion, $categoria)) {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Redirigir</title>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'La categoría ingresada ya existe',
                    confirmButtonColor: '#007bff'
                }).then(function() {
                    window.location.href = '../views/categoria.php';
                });
            </script>
        </body>
        </html>";
    } else {
        if (agregarCategoria($conexion, $categoria)) {
            echo "<script>window.location.href='../views/categoria.php'</script>";
        } else {
            //RECUADRO QUE MUESTRA EL ERROR NO ES NECESARIO CREAR UNA VISTA PARA ELLO//
            echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Redirigir</title>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <div class='alert alert-danger text-center'>Error al agregar la Categoria " . $conexion->error . "</div>
            </body>
            </html>";
        }
    }
}
?>
