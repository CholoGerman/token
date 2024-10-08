<?php
require_once 'modelo.php';

$funcion = $_GET["funcion"];
switch ($funcion) { 
  case "login":
    login();
    break;


}


function login(){
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $dao = new SesionDAO();
    $usuario = $dao->getUsuarioCorreo($correo);

    if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
        session_start();
        $_SESSION['correo'] = $correo;
        echo "¡Contraseña correcta!";
    } else {
        echo "Correo o contraseña incorrectos.";
        session_destroy();
    }
}