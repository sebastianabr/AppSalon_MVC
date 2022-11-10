<?php 

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use MVC\Router;
use Model\Servicio;
class APIController{
    public static function servicios(){
        $servicios= Servicio::all();
        echo json_encode($servicios);
    }
    public static function guardar(){
        $respuesta = [
            "respuesta" => true
        ];
        $servicios = explode(",",$_POST["servicios"]);
      
        $cita = new Cita($_POST);
        $resultado_cita = $cita->crear();
   
        $i =0;
        foreach($servicios as $servicio){
            $citaServicio = new CitaServicio(["cita_id"=>$resultado_cita["id"],"servicio_id"=>$servicio]);
         
            $resultado=$citaServicio->crear();
     
        }
        echo json_encode($_POST);
    }
}