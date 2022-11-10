<?php

namespace Controllers;

use Model\AdminCita;
use MVC\Router;
use Model\Servicio;
use Model\Cita;

class AdminController{
    public static function index(Router $router){
        if(!isset($_SESSION["admin"])){
            session_start();
        }
        $sesion = $_SESSION["admin"]??'';

        if($sesion!=='1'){
            header("Location: /");
        }
        
        $fecha= $_GET["fecha"]??date("Y-m-d");
        $query="select usuario.nombre,usuario.email ,usuario.telefono,cita.id,servicio.nombre as servicio,servicio.costo  from citas_servicios" ;
        $query.=" left join cita";
        $query.=" on cita.id =citas_servicios.cita_id" ;
        $query.=" left join usuario";
        $query.=" on cita.id_usuario = usuario.id" ;
        $query.=" left join servicio";
        $query.=" on servicio.id  = citas_servicios.servicio_id WHERE fecha='${fecha}'" ;
        
        $datos =  AdminCita::SQL($query);
        $router->render("admin/index",["datos"=>$datos,"fecha"=>$fecha]);

    }
    public static function servicios($router){
        if(!isset($_SESSION["admin"])){
            session_start();
        }
        $sesion = $_SESSION["admin"]??'';
        if($sesion!=='1'){
            header("Location: /");
        }
        $servicios = Servicio::all();
        $router->render("admin/servicios",["servicios"=>$servicios]);

    }
    public static function eliminarCita($router){
        if(!isset($_SESSION["admin"])){
            session_start();
        }
        $sesion = $_SESSION["admin"]??'';
        if($sesion!=='1'){
            header("Location: /");
            exit;
        }
        $cita = Cita::find($_POST["id"]);
        $resultado=$cita->eliminar();
        if($resultado){
            header("Location: /admin/index");

        }
    }
    public static function eliminarServicio($router){
        if(!isset($_SESSION["admin"])){
            session_start();
        }
        $sesion = $_SESSION["admin"]??'';
        if($sesion!=='1'){
            header("Location: /");
            exit;
        }
        
        $servicio=Servicio::find($_POST["id"]??'');
        $resultado=$servicio->eliminar();
        if($resultado){
            header("Location:/admin/servicios");
        }
    }
    public static function actualizarServicio($router){
        if(!isset($_SESSION["admin"])){
            session_start();
        }
        $sesion = $_SESSION["admin"]??'';
        if($sesion!=='1'){
            header("Location: /");
        }
        $id=$_GET["id"];
        $servicio=Servicio::find($id);
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $servicio->sincronizar($_POST);
            $servicio->actualizar();
            header("Location: /admin/servicios");
        }
        $router->render("admin/actualizarServicio",["servicio"=>$servicio]);

    }
    
    public static function crearServicio($router){
        if(!isset($_SESSION["admin"])){
            session_start();
        }
        $sesion = $_SESSION["admin"]??'';
        if($sesion!=='1'){
            header("Location: /");
        }
        $servicio=new Servicio();
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $servicio->sincronizar($_POST);
            $resultado=$servicio->crear();
            if($resultado){
                header("Location: /admin/index");
            }
        }
        $router->render("admin/crearServicio",["servicio"=>$servicio]);
    }
}