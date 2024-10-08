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
    $usuario = $dao->login($correo);

}