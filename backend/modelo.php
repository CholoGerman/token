<?php

require_once "conexion.php";

class SesionDAO {
    private $conn;
    function getUsuarioCorreo($correo) {
        $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $result = mysqli_query($this->conn, $query);
        $usuario = mysqli_fetch_assoc($result);
        return $usuario;
    }
}

?>