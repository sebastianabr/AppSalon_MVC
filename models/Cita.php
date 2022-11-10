<?php 

namespace Model;
class Cita extends ActiveRecord{
    protected static $tabla = 'cita';
    protected static $columnasDB = ["id","fecha","hora","id_usuario"];
    public $id;
    public $fecha;
    public $hora;
    public $id_usuario;
    public function __construct($args=[])
    {   
        $this->fecha=$args["fecha"] ?? '';        
        $this->hora=$args["hora"] ?? '';        
        $this->id_usuario=$args["id_usuario"] ?? '';        
    }
}