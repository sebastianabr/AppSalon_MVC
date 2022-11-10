<div class="contenedor contenedor-login">
    <h2>Olvide Password</h2>
    <p class="inicia-sesion">Restable tu password escribiendo tu email a continuacion</p>
    <?php if($mensaje){ ?>
        <div class="alerta correcta"><?php echo "Se ha enviado las intrucciones a su correo" ?></div>
    <?php }?>
    <form class="formulario" method="POST">
        <div class="campos">
         <label for="email">Email</label>
         <input type="text" id="email" placeholder="Tu Email" class="" name="email">
        </div>
        <input type="submit" class="boton-azul" value="Enviar Instrucciones">
        <div class="login-links">
            <a href="'/" >¿Ya tienes una cuenta? Inicia Sesión</a>
            <a href="/registrarse">¿Aun no tienes una cuenta? Crea una</a>
        </div>
    </form>
</div>