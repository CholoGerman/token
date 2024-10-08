<?php

class Modelo {
  private $credenciales = [
    'usuario' => 'mi_usuario',
    'contraseña' => 'mi_contraseña'
  ];

  public function crearToken($username, $password) {
    if ($username === $this->credenciales['usuario'] && $password === $this->credenciales['contraseña']) {
      $token = hash_hmac('sha256', 'mi_mensaje', 'mi_llave_secreta');
      return $token;
    } else {
      return false;
    }
  }
}