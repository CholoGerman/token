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


    function createToken($username) {
        $token = base64_encode(json_encode(['username' => $username, 'exp' => time() +
        10]));
        $signature = hash_hmac('sha256', $token, $secretKey);
        return $token . '.' . $signature; 
        }


    }

?>