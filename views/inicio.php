<!-- realiza el llamado de la cabecera -->
<?php include('../templates/cabeza.php'); ?>

<style>
    .home-section{
        background-image: url("../views/img/BIBLIOTECAFONDO.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position:center;
    }

    .card{
        border: 1px solid #000;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-body{
        text-align: center;
    }

    .card-title{
        font-size: 24px;
        color: #8B4513;
        /* Color madera */
    }

    .card-text{
        font-size: 18px;
        color: #8B4513;
        /* Color madera */
    }

    .card-icon{
        font-size: 48px;
        padding: 10px;
        border-radius: 50%;
        background-color: #fff;
        color: #8B4513;
        /* Color madera */
    }
</style>

<!-- el span es para todos los encabezados -->
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text" style="color: white;">Inicio</span>
    </div>

    <!-- Empieza el codigo aqui -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Libros</h3>
                        <p class="card-text"><?php 
                        include('./contar_libros.php');
                        echo $fila['total'];?></p>
                        <i class="fas fa-book card-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Autores</h3>
                        <p class="card-text"><?php 
                        include('./contar_autores.php');
                        echo $fila['total_autores'];?></p>
                        <i class="fas fa-user card-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Categorias</h3>
                        <p class="card-text"><?php 
                        include('./contar_categorias.php');
                        echo $fila['total'];?></p>
                        <i class="fas fa-tags card-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Libros Prestados</h3>
                        <p class="card-text"><?php 
                        include('./contar_prestamos.php');
                        echo $fila['total'];?></p>
                        <i class="fas fa-handshake card-icon"></i>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</section>

<?php include('../templates/pie.php'); ?>
