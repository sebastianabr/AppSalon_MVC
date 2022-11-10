<?php
namespace Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Model\Usuario;
use MVC\Router;
class UsuarioController{
    public static function login($router){
        $errores=[];


        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $usuario = new Usuario($_POST);
            $confirmado=$usuario->validarLogin();
            $errores=Usuario::getAlertas()["error"]??[];
            if(count($errores)===0){
                session_start();
                
                $_SESSION["email"]=$confirmado->email;
                $_SESSION["nombre"]=$confirmado->nombre;
                $_SESSION["id"]=$confirmado->id;
                $_SESSION["apellido"]=$confirmado->apellido;
                $_SESSION["admin"]=$confirmado->admin;
                if($confirmado->admin==="1"){
                    header("Location: /admin/index");
                    
                }
                else{
                    header("Location:/cita");
                }
               
            }
        }
        $router->render("usuario/login",["errores"=>$errores]);

    }
    public static function registrarse($router){
        $errores=[];
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $usuario = new Usuario($_POST);
            $usuario->validarRegistro();
            $errores=Usuario::getAlertas()["error"]??[];
            if(count($errores)===0){
                $usuario->password=password_hash($usuario->password,PASSWORD_BCRYPT);
                $usuario->confirmado=0;
                $usuario->token =uniqid();
                $usuario->admin=0;
                $resultado=$usuario->crear();
                if($resultado['resultado']){
                    enviarEmail($usuario->token,"Para confirmar su token haga click aqui","confirmar");
    
                    header("Location: /mensaje");
                }
            }
        }
        $router->render("usuario/registrarse",["errores"=>$errores]);

    }
    public static function mensaje($router){
        $errores=[];
        $router->render("usuario/mensaje",["errores"=>$errores]);
    }
    public static function confirmar($router){
        $correcto=false;
        if($_SERVER["REQUEST_METHOD"]==="GET"){
            $validar=Usuario::findToken($_GET["token"]);

            if($validar){
                $validar->confirmado=1;
                $resultado=$validar->actualizar();
                if($resultado){
                    $correcto=true;
                }
            }
            else{}
        }
        $router->render("usuario/confirmar",["correcto"=>$correcto]);
    }
    public static function olvide($router){
        $errores=[];
        $correcto=false;
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $usuario = Usuario::findEmail($_POST["email"])??null;
            if($usuario){
                $usuario->token=uniqid();
                $resultado=$usuario->actualizar();
                if($resultado){
                    enviarEmail($usuario->token,"Para crear una nueva contraseña haga click aqui","recuperar");
                    $correcto=true;
                }
            }
            else{
                $errores[]="No se encontró el email";
            }
        }
        $router->render("usuario/olvide",["errores"=>$errores,"mensaje"=>$correcto]);
        
    }
    public static function recuperar($router){
        $errores=[];
        $token=$_GET["token"]??null;
        if($token){
            $usuario=Usuario::findToken($token);
            if($usuario){
                if($_SERVER["REQUEST_METHOD"]==="POST"){
                    $errores=[];
                    $contrasenia=$_POST["password"]??'';
                    if($contrasenia===''){
                        $errores[]="Contraseña no puede estar vacia";
                    }
                    else{
                        $usuario->password=password_hash($contrasenia,PASSWORD_BCRYPT);
                        $resultado=$usuario->actualizar();
                        if($resultado){
                            header("Location:/");
                        }
                        else{
                            $errores[]="Un error ha ocurrido";
                        }
                    }
                }
                $router->render("usuario/recuperar",["errores"=>$errores]);
            }

        }
    }
    
    
}