<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia sesión con tus datos</p>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label class="labels" for="email">Email</label>
        <input
            type="email"
            id="email"
            placeholder="Tu Email"
            name="email"
            
        />
    </div>

    <div class="campo">
        <label class="labels" for="password">Contraseña</label>
        <input 
            type="password"
            id="password"
            placeholder="Tu Contraseña"
            name="password"
        />
    </div>

    <input type="submit" class="boton" value="Iniciar Sesión">
</form>

<div class="acciones">
    <a class="acciones-bold" href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
    <a class="acciones-bold" href="/olvide">¿Olvidaste tu Contraseña?</a>
</div>