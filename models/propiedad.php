<?php

namespace Model;



class Propiedad extends ActiveRecord{

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id','titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorid'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorid;

    public function __construct($args = []) // $args = [] es un arreglo por default
    {
        $this->id = $args['id'] ?? null; 
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorid = $args['vendedorid'] ?? '';

    }

    public function validar(){
         
        // Validador
        if(!$this->titulo){
            self::$errores[]= "Debes añadir un titulo"; // añade este mensaje al arreglo automaticamente
        }
        
        if(!$this->precio){
            self::$errores[]= "El precio es obligatorio"; // añade este mensaje al arreglo automaticamente
        }
        
        if(strlen($this->descripcion) <50){
            self::$errores[]= "la descripcion es obligatoria y con al menos 50 caracteres"; // añade este mensaje al arreglo automaticamente
        }
        
        if(!$this->habitaciones){
            self::$errores[]= "El número de habitaciones es obligatorio"; // añade este mensaje al arreglo automaticamente
        }
        
        if(!$this->wc){
            self::$errores[]= "El número de baños es obligatorio"; // añade este mensaje al arreglo automaticamente
        }
        
        if(!$this->estacionamiento){
            self::$errores[]= "El número de lugares de estacionamiento es obligatorio"; // añade este mensaje al arreglo automaticamente
        }
        
        if(!$this->vendedorid){
            self::$errores[]= "Elige un vendedor"; // añade este mensaje al arreglo automaticamente
        }
        
        if(!$this->imagen){
             self::$errores[] = 'La imagen es obligatoria';
         }
        
        return self::$errores;
        }
}