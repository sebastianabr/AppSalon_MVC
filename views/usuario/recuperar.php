<div class="contenedor contenedor-login">
    <h2>Recuperar Password</h2>
    <p class="inicia-sesion">Coloca tu nuevo password a continuacion</p>
  
        <?php foreach($errores as $error){ ?>
            <div class="alerta error"><?php echo $error ?></div>
        <?php }?>
    <form class="formulario" method="POST">
        <div class="campos">
         <label for="password">Password</label>
         <input type="password" id="password" placeholder="Tu nueva password" class="" name="password">
        </div>
        <input type="submit" class="boton-azul" value="Guardar Nueva Password">
        <div class="login-links">
            <a href="'/" >¿Ya tienes una cuenta? Inicia Sesión</a>
            <a href="/registrarse">¿Aun no tienes una cuenta? Crea una</a>
        </div>
    </form>
</div>