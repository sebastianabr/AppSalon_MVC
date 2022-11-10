<?php
namespace Model;
use Model\ActiveRecord;

class AdminCita extends ActiveRecord{
    public $nombre;
    public $email;
    public $telefono;
    public $id;
    public $servicio;
    public $costo;
    public function _construct($args=[]){
         $this->nombre=$args["nombre"] ?? '';
         $this->email=$args["email"] ?? '';
         $this->telefono=$args["telefono"] ?? '';
         $this->id=$args["id"] ?? '';
         $this->servicio=$args["servicio"] ?? '';
         $this->costo=$args["costo"] ?? '';
    }
    public static function SQL($consulta) {
        $query = $consulta;
        $resultado = self::consultarSQL($query);
        return  $resultado  ;
    }
}