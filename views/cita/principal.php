<?php session_start(); $script="<script src='build/js/app.js'> </script>";
    if(!isset($_SESSION["nombre"])){
        header("Location: /");
    }

 ?>
<div class="contenedor contenedor-login">
    <div class="sesion">
        <p><?php echo ($_SESSION["nombre"].$_SESSION["apellido"]) ?></p>
        <a href="/cita/cerrar_sesion">Cerrar Sesión</a>
    </div>
    <div class="nav-cita">
        <input type="button"  class="nav-cita__boton" value="SERVICIOS" page_data="1">
        <input type="button" class="nav-cita__boton" value="INFORMACION CITA" page_data="2">
        <input type="button" class="nav-cita__boton" value="RESUMEN" page_data="3">
    </div>
    <div class="main-servicios">
        <h2>Servicios</h2>
        <p class="inicia-sesion">Elige tus servicios a continuacion</p>
        <div class="contenedor-servicios">
            
  
        </div>
    </div>
    <div class="informacion-cita ocultar">
        <h2>Tus Datos y Cita</h2>
        <p class="inicia-sesion">Coloca tus datos y fecha de tu cita</p>
        <form class="formulario">
            <div class="campos">
                <label>Nombre</label>
                <input id="nombre" class="input-nombre" type="text" disabled value="<?php echo ($_SESSION["nombre"] . $_SESSION["apellido"])?>">
            </div>
            <div class="campos">
                <label>Fecha</label>
                <input id="fecha" type="date" min="<?php echo date("Y-m-d",strtotime("+1 day"))?>">
            </div>
            <div class="campos">
            <label>Hora</label>
                <input id="hora" type="time">
            </div>
            <input id="id_usuario" type="hidden" value="<?php echo $_SESSION["id"] ?>">
  
        </form>

    </div>
    <div class="resumen ocultar">
            <h2>Resumen Servicios</h2>
            <h2>Resumen Cita</h2>
        </div>
    </div>

    <div class="botones-paginas">
        <input type="button" class="boton-azul boton-anterior nover" value="Anterior">
        <input type="button" class="boton-azul boton-siguiente nover" value="Siguiente">

    </div>

</div>