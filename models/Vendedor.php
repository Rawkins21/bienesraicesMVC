<?php

namespace Model;

class Vendedor extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'email', 'imagen'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $imagen;

    public function __construct($args = []) // $args = [] es un arreglo por default
    {
        $this->id = $args['id'] ?? null; 
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->imagen = $args['imagen'] ?? '';



    }

    public function validar(){
         
        // Validador
        if(!$this->nombre){
            self::$errores[]= "Debes añadir un Nombre";

        }
        if(!$this->apellido){
        self::$errores[]= "Debes añadir un Apellido";

        }
        if(!$this->telefono){
        self::$errores[]= "Debes añadir un Telefono";

        }
        if(!$this->email){
        self::$errores[]= "Debes añadir un Email";

        }
        if(!$this->imagen){
        self::$errores[]= "Debes añadir una Imagen";

        }

        // if(!preg_match('/[0-9]{9} /', $this->telefono)){ // especifica que tipo de datos son validos 
        // self::$errores[]= "Formato no valido";

        // }
    
        return self::$errores;
    }
}