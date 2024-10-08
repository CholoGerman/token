<?php
require_once 'modelo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $modelo = new Modelo();
  $token = $modelo->crearToken($username, $password);

  if ($token) {
    echo json_encode(['token' => $token]);
  } else {
    echo json_encode(['error' => 'Credenciales incorrectas']);
  }
}