<?php

namespace Model;

class Usuario extends ActiveRecord {
  
  // Base de datos
  protected static $tabla = 'usuarios';
  protected static $columnasDB = ['id','nombre','apellido','email','password','telefono','admin','confirmado','token',];

  public $confirmar_password;
  public $id;
  public $nombre;
  public $apellido;
  public $email;
  public $password;
  public $telefono;
  public $admin;
  public $confirmado;
  public $token;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
    $this->admin = $args['admin'] ?? '0';
    $this->confirmado = $args['confirmado'] ?? '0';
    $this->token = $args['token'] ?? '';
  }

  // Mensajes de validacion para la creacion de una cuenta
  public function validarNuevaCuenta() {
    if(!$this->nombre) {
      self::$alertas['error'][] = 'El Nombre es Obligatorio';
    }
    if(!$this->apellido) {
      self::$alertas['error'][] = 'El Apellido es Obligatorio';
    }
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      self::$alertas['error'][] = 'El Email es Obligatorio o Esta mal escrito';
    }
    if(empty($this->password)) {
      self::$alertas['error'][] = 'La Contraseña es Obligatoria';
    } elseif(strlen($this->password) < 6) {
      self::$alertas['error'][] = 'La Contraseña debe tener al menos 6 caracteres';
    }
    return self::$alertas;
  }

  public function validarLogin() {
    
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      self::$alertas['error'][] = 'El Email es Obligatorio o Esta mal escrito';
    }
    if(!$this->password) {
      self::$alertas['error'][] = 'La Contraseña es Obligatoria';
    }
    return self::$alertas;
  }

  public function validarEmail() {
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      self::$alertas['error'][] = 'El Email es Incorrecto o Esta mal escrito';
    }
    return self::$alertas;
  }

  public function validarPassword() {
    if(!$this->password) {
      self::$alertas['error'][] = 'Por favor ingresa tu contraseña';
    } else if(strlen($this->password) < 6) {
      self::$alertas['error'][] = 'La contraseña debe tener al menos 6 caracteres';
    } else if($this->password !== $this->confirmar_password) {
      self::$alertas['error'][] = 'Las contraseñas no coinciden';
    } 
    return self::$alertas;
  }

 

  // Revisa si el usuario ya existe
  public function existeUsuario() {
    $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

    $resultado = self::$db->query($query);

    if($resultado->num_rows) {
      self::$alertas['error'][] = 'El Usuario ya esta registrado';
    }

    return $resultado;
  }

  public function hashPassword() {
    $this->password = password_hash( $this->password, PASSWORD_BCRYPT );
  }

  public function crearToken() {
    $this->token = uniqid();
  }

    public function comprobarPasswordAndVerificado($password) {

    $resultado = password_verify($password, $this->password);

    if(!$resultado || !$this->confirmado) {
      self::$alertas['error'][] = 'La Contraseña es Incorrecta o tu Cuenta no ha sido confirmada';
    } else {
      return true;
    }
  }

 

  // ...

}