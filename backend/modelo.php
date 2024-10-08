<?php

require_once "conexion.php";

class SesionDAO {
    private $conn;
    function login($correo) {
        $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $result = mysqli_query($this->conn, $query);
        $usuario = mysqli_fetch_assoc($result);
        
    if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
        session_start();
        $_SESSION['correo'] = $correo;
        echo "¡Contraseña correcta!";
    } else {
        echo "Correo o contraseña incorrectos.";
        session_destroy();
    }
        return $usuario;
    }


    function createToken($correo) {
        $token = base64_encode(json_encode(['correo' => $correo, 'exp' => time() +
        10]));
        $signature = hash_hmac('sha256', $token);
        return $token . '.' . $signature; 
        }


    }

?>