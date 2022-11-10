<?php
namespace Controllers;
use MVC\Router;
Class CitaController{
    public static function principal($router){
        echo "yendo a cita";
        $router->render("cita/principal");
    }
    public static function cerrarSesion(){
        session_start();
        $_SESSION=[];
        header("Location: /");
    }
}
/*

    ALTER TABLE usuario ADD (password char(60) NOT NULL, token varchar(60), confirmado int); 

*/