<?php

namespace Model;
class Servicio extends ActiveRecord{
    protected static $tabla = 'servicio';
    protected static $columnasDB = ["id","nombre","costo"];
    public $id;
    public $nombre;
    public $costo;
    public function __construct($args=[])
    {   
        $this->id=$args["id"] ?? '';        
        $this->nombre=$args["nombre"] ?? '';        
        $this->costo=$args["costo"] ?? '';       
    }

}