<?php 
    $script = "<script src='/build/js/citaAdmin.js'></script>";
?>
<div class="contenedor contenedor-login">
    <div class="sesion">
        <p><?php echo ($_SESSION["nombre"].$_SESSION["apellido"]) ?></p>
        <a href="/cita/cerrar_sesion">Cerrar Sesión</a>
    </div>
    <div class="admin-navegacion">
        <a href="/admin/index" class="boton-azul">Ver Citas</a>
        <a href="/admin/servicios" class="boton-azul">Ver Servicios</a>
        <a href="/admin/crearServicio" class="boton-azul">Nuevo Servicio</a>
    </div>

    <div>
            <form class="formulario">

            <div class="campos">
                <label for="fecha">Fecha: </label>
                <input id="fecha" type="date" value="<?php echo $fecha ?>">
            </div>
            </form>


            <?php  $id=0; foreach($datos as $dato){  ?>
                <?php if($id!==$dato->id){ ?>
                <div class="admin-cita">
                    <h2>Cita</h2>
                    <p><span>id: </span><?php echo $dato->id ?></p>
                    <p><span>nombre: </span><?php echo $dato->nombre ?></p>
                    <p><span>correo: </span><?php echo $dato->email ?></p>
                    <p><span>telefono: </span><?php echo $dato->telefono ?></p>
                    <form method="POST" action="/admin/eliminarCita">
                        <input type="hidden" value="<?php echo $dato->id ?>" name="id">
                        <input type="submit" class="boton-rojo" value="Eliminar" >
                    </form>
                    <p>Servicios</p>
                </div>
                <?php $id =$dato->id; } ?>
                <div class="admin-servicio borde-blanco">
                    <p><span>nombre: </span> <?php echo $dato->servicio?></p>
                    <p><span>costo: </span><?php echo $dato->costo?></p>
                </div>

            <?php }?>
                
                
            <input type="hidden" value="" id="fecha_hidden" >
    </div>

</div>