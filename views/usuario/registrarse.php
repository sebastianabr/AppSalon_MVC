<div class="contenedor contenedor-login">
    <h2>Crear Cuenta</h2>
    <?php 
        foreach($errores as $error){      
    ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php }?>
    <p class="inicia-sesion">Llena el siguiente formulario para crear una cuenta</p>
    <form class="formulario" method="POST">
    <div class="campos">
         <label for="nombre">Nombre</label>
         <input type="text" id="nombre" placeholder="Tu Nombre" class="" name="nombre">
        </div>
        <div class="campos">
         <label for="apellido">Apellido</label>
         <input type="text" id="apellido" placeholder="Tu Apellido" class="" name="apellido">
        </div>
        <div class="campos">
         <label for="telefono">Telefono</label>
         <input type="tel" id="telefono" placeholder="Tu Telefono" class="" name="telefono">
        </div>
        <div class="campos">
         <label for="email">Email</label>
         <input type="email" id="email" placeholder="Tu Email" class="" name="email">
        </div>

        <div class="campos">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="Tu Password" class="" name="password">
        </div>
        <input type="submit" class="boton-azul" value="Crear Cuenta">

    </form>
</div>