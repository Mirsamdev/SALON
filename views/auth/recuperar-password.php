<h1 class="nombre-pagina">Recuperar Contraseña</h1>

<?php if($error): ?>
  <p class="descripcion-pagina">¡Ups! Ha ocurrido un error, por favor verifica tus datos e inténtalo de nuevo.</p>
<?php else: ?>
  <p class="descripcion-pagina">Coloca tu nueva Contraseña a continuación</p>
<?php endif; ?>

<?php
    include __DIR__ . "/../templates/alertas.php";
?>

<?php if($error) return; ?>



<form class="formulario" method="POST">
  <div class="campo">
    <label class="labels" for="password">Contraseña</label>
    <input 
    type="password"
    id="password"
    name="password"
    placeholder="Tu Nueva Contraseña"
    />
  </div>

  <div class="campo">
    <label class="labels" for="confirmar-password">Confirmar Contraseña</label>
    <input 
    type="password"
    id="confirmar-password"
    name="confirmar_password"
    placeholder="Confirmar Contraseña"
    />
  </div>
  <input type="submit" class="boton" value="Guardar Nueva Contraseña">
</form>

<div class="acciones">
    <a class="acciones-bold" href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a class="acciones-bold" href="/crear-cuenta">¿Aún no tienes una cuenta? Crear Una</a>
</div>