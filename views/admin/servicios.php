<div class="contenedor contenedor-login admin-servicios">
    <div class="admin-navegacion">
        <a href="/admin/index" class="boton-azul">Ver Citas</a>
        <a href="/admin/servicios" class="boton-azul">Ver Servicios</a>
        <a href="/admin/crearServicio" class="boton-azul">Nuevo Servicio</a>
    </div>
    <h2>Servicios</h2>
    <ul>          
    <?php foreach($servicios as $servicio){ ?>
        <li>
         <p><span>Servicio: </span><?php echo $servicio->nombre ?></p>
         <p><span>Costo: </span><?php echo $servicio->costo ?> $</p>
         <div class="servicios-botones">
            <a href="/admin/actualizarServicio?id=<?php echo $servicio->id ?>" class="boton-naranja">Actualizar</a>
            <form method="POST" action="/admin/eliminarServicio">
            <div>
                <input type="hidden" name="id" value="<?php echo $servicio->id ?>" >
                <input type="submit" value="Eliminar" class="boton-rojo">
            </div>
            </form>
         </div>
        </li>
     <?php }  ?>
     </ul>

</div>