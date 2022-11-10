<?php

namespace Model;
class Usuario extends ActiveRecord{
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['id','email','password','nombre','apellido','telefono','confirmado','token','admin'];
    public $id;
    public $email;
    public $password;
    public $nombre;
    public $apellido;
    public $telefono;
    public $confirmado;
    public $token;
    public $admin;
    public function __construct($args=[])
    {   
        $this->id=$args["id"] ?? '';        
        $this->email=$args["email"] ?? '';        
        $this->nombre=$args["nombre"] ?? '';        
        $this->apellido=$args["apellido"] ?? '';        
        $this->telefono=$args["telefono"] ?? '';        
        $this->password=$args["password"] ?? '';        
        $this->confirmado=$args["confirmado"] ?? '';        
        $this->token=$args["token"] ?? '';        
    }
    public function validarLogin(){
        self::$alertas=[];
        if($this->email===''){
            $this->setAlerta("error","El campo email no puede estar vacio");
        }
        if($this->password===''){
            $this->setAlerta("error","El campo password no puede estar vacio");
        }
        $email=self::findEmail($this->email);
        if($email && $email->confirmado==='1'){
            if(password_verify($this->password,$email->password)){
                return $email;
                
            }
            else{
                $this->setAlerta("error","La contraseña es incorrecta");
            }
        }
        else{
            $this->setAlerta("error","El email es invalido o No ha sido confirmada");
        }

    }
    public function validarRegistro(){
        self::$alertas=[];
        if($this->email===''){
            $this->setAlerta("error","El email no puede ir vacio");
        }
        if($this->nombre===''){
            $this->setAlerta("error","El nombre no puede ir vacio");
        }
        if($this->password===''){
            $this->setAlerta("error","El password no puede ir vacio");
        }
        if($this->apellido===''){
            $this->setAlerta("error","El apellido no puede ir vacio");
        }
        $email = self::findEmail($this->email);
        if($email){
            $this->setAlerta("error","El correo ya existe");
        }else{
            
        }
    }
    public static function findEmail($email){
        $email = self::$db->real_escape_string($email);
        $query="SELECT * from usuario WHERE email='${email}'";

        $resultado=self::consultarSQL($query);
        return array_shift($resultado);
    }
    public static function findToken($token){
        $email = self::$db->real_escape_string($token);
        $query="SELECT * from usuario WHERE token='${token}'";

        $resultado=self::consultarSQL($query);
        return array_shift($resultado);
    }
    public function createOject($array){
        $objeto = new static($array);
    }

}