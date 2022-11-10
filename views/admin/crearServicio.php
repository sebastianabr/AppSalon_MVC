<div class="contenedor contenedor-login">
    <h2>Crear Servicio</h2>
    <form class="formulario" method="POST">
        <div class="campos">
            <label>Nombre: </label>
            <input name="nombre" type="text" value="<?php echo $servicio->nombre ?>">
        </div>
        <div class="campos">
            <label >Costo:</label>
            <input name="costo" type="text" value="<?php echo $servicio->costo ?>">
        </div>

        <input type="submit" class="boton-azul" value="Crear Servicio" >
    </form>
  
</div>