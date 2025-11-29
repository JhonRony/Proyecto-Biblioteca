<?php
class User {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function login($usuario, $password) {
        $sql = $this->conexion->prepare("SELECT * FROM personal WHERE usuario = ? AND password = ?");
        $sql->bind_param("ss", $usuario, $password);
        $sql->execute();
        return $sql->get_result()->fetch_object();
    }

    public function register($usuario, $password, $nombre) {
        $sql_check = $this->conexion->prepare("SELECT * FROM personal WHERE usuario = ?");
        $sql_check->bind_param("s", $usuario);
        $sql_check->execute();
        if ($sql_check->get_result()->num_rows == 0) {
            $sql_insert = $this->conexion->prepare("INSERT INTO personal (usuario, password, nombre) VALUES (?, ?, ?)");
            $sql_insert->bind_param("sss", $usuario, $password, $nombre);
            return $sql_insert->execute();
        }
        return false;
    }
}
?>
