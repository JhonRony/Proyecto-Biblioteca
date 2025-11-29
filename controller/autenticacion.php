<?php
session_start();
include('../config/conexion.php');
include('../models/User.php');

class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function login() {
        if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];
            $datos = $this->userModel->login($usuario, $password);
            if ($datos) {
                $_SESSION["ID_Usuario"] = $datos->id;
                $_SESSION["nombre"] = $datos->nombre;
                header('Location: ../views/inicio.php');
                exit();
            } else {
                echo "<div class='alert alert-danger text-center'>USUARIO Y CONTRASEÑA INCORRECTA</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>EL USUARIO NO EXISTE</div>";
        }
    }

    public function register() {
        if (!empty($_POST["nuevo_usuario"]) && !empty($_POST["nuevo_password"]) && !empty($_POST["nombre"])) {
            $nuevo_usuario = $_POST["nuevo_usuario"];
            $nuevo_password = $_POST["nuevo_password"];
            $nombre = $_POST["nombre"];
            if (filter_var($nuevo_usuario, FILTER_VALIDATE_EMAIL)) {
                if ($this->userModel->register($nuevo_usuario, $nuevo_password, $nombre)) {
                    echo "<div class='alert alert-success text-center'>Usuario registrado con éxito</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>El usuario ya existe</div>";
                }
            } else {
                echo "<div class='alert alert-danger text-center'>Ingrese un correo válido</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>Rellene todos los campos</div>";
        }
    }
}

$conexion = new mysqli("localhost", "root", "", "mi_base_datos");
$authController = new AuthController($conexion);

if (!empty($_POST["btningresar"])) {
    $authController->login();
}

if (!empty($_POST["btnregistrar"])) {
    $authController->register();
}

$conexion->close();
?>
