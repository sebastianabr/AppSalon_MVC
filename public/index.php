<?php 
require "../includes/app.php";

use Controllers\AdminController;
use MVC\Router;
use Controllers\UsuarioController;
use Controllers\CitaController;
use Controllers\APIController;
$router = new Router();

//usuario
$router->get("/",[UsuarioController::class,'login']);
$router->post("/",[UsuarioController::class,'login']);
$router->get("/mensaje",[UsuarioController::class,'mensaje']);
$router->get("/confirmar",[UsuarioController::class,'confirmar']);
$router->get("/registrarse",[UsuarioController::class,"registrarse"]);
$router->post("/registrarse",[UsuarioController::class,"registrarse"]);
$router->get("/olvide",[UsuarioController::class,"olvide"]);
$router->post("/olvide",[UsuarioController::class,"olvide"]);
$router->get("/recuperar",[UsuarioController::class,"recuperar"]);
$router->post("/recuperar",[UsuarioController::class,"recuperar"]);
//cita
$router->get("/cita",[CitaController::class,"principal"]);

//API
$router->get("/API/servicios",[APIController::class,"servicios"]);
$router->post("/API/cita",[APIController::class,"guardar"]);

//Cerrar Sesion
$router->get("/cita/cerrar_sesion",[CitaController::class,"cerrarSesion"]);

//Administrador
$router->get("/admin/index",[AdminController::class,"index"]);
$router->get("/admin/servicios",[AdminController::class,"servicios"]);
$router->post("/admin/eliminarCita",[AdminController::class,"eliminarCita"]);
$router->post("/admin/eliminarServicio",[AdminController::class,"eliminarServicio"]);
$router->get("/admin/actualizarServicio",[AdminController::class,"actualizarServicio"]);
$router->post("/admin/actualizarServicio",[AdminController::class,"actualizarServicio"]);
$router->get("/admin/crearServicio",[AdminController::class,"crearServicio"]);
$router->post("/admin/crearServicio",[AdminController::class,"crearServicio"]);


$router->comprobarRutas();