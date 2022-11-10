<?php 
namespace MVC;
class Router{
    public $rutas_GET = [];
    public $rutas_POST=[];
    public function __construct()
    {
    }
    public function get(string $ruta,$fn):void{
        $this->rutas_GET[$ruta]=$fn;
    }   
    public function post(string $ruta,$fn){
        $this->rutas_POST[$ruta]=$fn;
    }
    public function comprobarRutas(){
        $ruta = $_SERVER["REQUEST_URI"]==='' ? "/":$_SERVER["REQUEST_URI"];
        $ruta2=explode('?',$ruta);
        $ruta2=$ruta2[0];
        $metodo = $_SERVER["REQUEST_METHOD"];
        if($metodo==="GET"){
            if(array_key_exists($ruta2,$this->rutas_GET)){
                $fn = $this->rutas_GET[$ruta2];
            }
            else{
                $fn = null;
                echo "Pagina no encontrada";
            }
        }
        if($metodo==="POST"){
            if(array_key_exists($ruta2,$this->rutas_POST)){
                $fn = $this->rutas_POST[$ruta2];
            }
            else{
                $fn=null;
                echo "Pagina no encontrada";
            }
        }
        if($fn){
            call_user_func($fn,$this);
        }

    }
    public static function render($ruta,$args=[])
    {
        foreach($args as $key=>$value){
            $$key = $value;
        }
        
        ob_start();
        include "views/${ruta}.php";
        $contenido=ob_get_clean();
        include "views/layout.php";
    }
}