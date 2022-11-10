<div class="contenedor contenedor-login">
    <h2>Login</h2>
    <p class="inicia-sesion">Inicia sesión con tus datos</p>
    <?php 
        foreach($errores as $error){      
    ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php }?>
    <form class="formulario" method="POST">
        <div class="campos">
         <label for="email">Email</label>
         <input type="text" id="email" placeholder="Tu Email" class="" name="email">
        </div>

        <div class="campos">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="Tu Password" class="" name="password">
        </div>
        <input type="submit" class="boton-azul" value="Iniciar Sesion">
        <div class="login-links">
            <a href="/registrarse">¿Aun no tienes una cuenta? Crea una</a>
            <a href="/olvide" >Olvidaste tu password?</a>
        </div>
    </form>
</div>