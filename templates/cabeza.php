<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8"> 
    <title>Inicio</title>
    <link rel="stylesheet" href="../templates/style.css">
    <!-- Boxicons CDN Link -->
    <link rel="stylesheet" href="../node_modules/boxicons/css/boxicons.min.css">
    <!-- Estilos de bootstrap -->
    <link rel="stylesheet" href="../plugin/bootstrap/dist/css/bootstrap.min.css">
    <!-- Estilos de Data Table js -->
    <link rel="stylesheet" href="../plugin/vanilla-dataTables.min.css">
    <!-- script de Data Table js -->
    <script src="../plugin/vanilla-dataTables.min.js"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-book-open"></i>
            <span class="logo_name">BIBLIOPLUS</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../views/inicio.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Inicio</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../views/inicio.php">Inicio</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="../views/categoria.php">
                        <i class='bx bx-collection'></i>
                        <span class="link_name">Categorias</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="../views/categoria.php">Categorias</a></li>
                    <li><a href="../views/agregar_categoria.php">Ingresar Categoria</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="../views/libro.php">
                        <i class='bx bx-book-alt'></i>
                        <span class="link_name">Libros</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="../views/libro.php">Libros</a></li>
                    <li><a href="../views/agregar_libro.php">Registro</a></li>
                </ul>
            </li>
            <li>
                <a href="../views/alumno.php">
                    <i class='bx bxs-user-circle'></i>
                    <span class="link_name">Registrar Alumno</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../views/agregar_alumno.php">Registro de Alumnos</a></li>
                </ul>
            </li>
            <li>
                <a href="../views/prestar_libros.php">
                    <i class='bx bxs-id-card'></i>
                    <span class="link_name">Prestamos</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../views/prestar_libros.php">Prestar Libros</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="link_name">Configuración</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Configuración</a></li>
                    <li><a href="../configuracion/preferencias_sistema.php" onclick="toggleThemeOptions(); return false;">Personalización</a></li>
                    <li><a href="../configuracion/info_sistema.php">Info del Sistema</a></li>
                    <li><a href="../configuracion/procesar_modificacion.php">Modificar Contraseña</a></li>
                    <div id="themeOptions" style="display: none;">
                        <button onclick="toggleTheme(); saveTheme('dark');" class="theme-button">Tema Oscuro</button>
                        <button onclick="toggleTheme(); saveTheme('light');" class="theme-button">Tema Claro</button>
                    </div>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../login/img/VONN.jpg" alt="profileImg">
                    </div>
                    <div class="name-job">
                        <div class="profile_name"></div>
                        <div class="job"><?php echo $_SESSION["nombre"]; ?></div>
                    </div>
                    <a href="../controller/controlador_cerrar_session.php" title="Cerrar Sesion"><i class='bx bx-log-out'></i></a>
                </div>
            </li>
        </ul>
    </div>
</body>
</html>
