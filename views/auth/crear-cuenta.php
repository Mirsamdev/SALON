<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<?php
    include __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="/crear-cuenta">

<div class="campo">
  <label class="labels" for="nombre">Nombre</label>
  <input 
    type="text"
    id="nombre"
    name="nombre"
    placeholder="Tu Nombre"
    value="<?php echo s($usuario->nombre); ?>"
  />
  </div>

  <div class="campo">
  <label class="labels" for="apellido">Apellido</label>
  <input 
    type="text"
    id="apellido"
    name="apellido"
    placeholder="Tu Apellido"
    value="<?php echo s($usuario->apellido); ?>"
  />
  </div>

  <div class="campo">
  <label class="labels" for="telefono">Telefono</label>
  <input 
    type="tel"
    id="telefono"
    name="telefono"
    placeholder="Tu Telefono"
    value="<?php echo s($usuario->telefono); ?>"
  />
  </div>

  <div class="campo">
  <label class="labels" for="telefono">E-Mail</label>
  <input 
    type="email"
    id="email"
    name="email"
    placeholder="Tu E-Mail"
    value="<?php echo s($usuario->email); ?>"
  />
  </div>

  <div class="campo">
  <label class="labels" for="password">Contraseña</label>
  <input 
    type="password"
    id="password"
    name="password"
    placeholder="Tu Contraseña"
  />
  </div>

  <input type="submit" value="Crear Cuenta" class="boton">
</form>

  <div class="acciones">
  <a class="acciones-bold" href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
  </div>