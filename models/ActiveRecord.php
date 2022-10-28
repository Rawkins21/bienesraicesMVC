<?php

namespace Model;

class ActiveRecord {

     // Base de Datos
     protected static $db;
     protected static $columnasDB = [];
     protected static $tabla = '';

     // Errores
     protected static  $errores = [];
 
 
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
 
     // Definir la conexion a la DB
     public static function setDB($database){
         self:: $db = $database; // self hace referencia a la funcion estatica. es necesario que no sea static para evitar exceso de llamadas al sv
                                 // mantener siempre como self referidos al sv
     }
 
     public function guardar(){
         if(!is_null($this->id)){
             // Actualizar
             $this->actualizar();
         } else{
             // Creando un nuevo registro
             $this->crear();
         }
         
     }
 
     public function crear(){
 
         // Sanitizar los datos
         $atributos= $this->sanitizarAtributos();
 
         
          //insertar en la base de datos
          $query = "INSERT INTO " .  static::$tabla . " ( ";
          $query.=  join(', ', array_keys($atributos));
          $query.= " ) VALUES (' "; 
          $query.= join("' , '", array_values($atributos));
          $query.=" ')";
         
         $resultado = mysqli_query(self:: $db, $query);
 
             // Mensaje de exito o error
             if ($resultado){
              // Redireccionar al usuario. el exceso de uso puede provocar loop de redirecciones
             header('Location: /admin?resultado=1');
     }
 }
 
     public function actualizar(){
         // Sanitizar los datos
         $atributos= $this->sanitizarAtributos();
 
         $valores = [];
         foreach($atributos as $key => $value){
             $valores[] = "{$key}='{$value}'";
         }
 
         $query = " UPDATE " . static::$tabla . " SET ";
         $query .=  join(', ', $valores);
         $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
         $query .= " LIMIT 1 ";
 
         $resultado = self::$db->query($query);
 
         if ($resultado){
             // Redireccionar al usuario. el exceso de uso puede provocar loop de redirecciones
             header('Location: /admin?resultado=2');
     }
 }
 
     // Eliminar un registro
     public function eliminar(){
        
         $query = "DELETE FROM " . static::$tabla . " WHERE id =" . self::$db->escape_string($this->id) . " LIMIT 1"; // LIMIT 1 limita la cantidad de registros a eliminar
         $resultado = self::$db->query($query);
 
         if($resultado){
             $this->borrarImagen();
             header('location: /admin?resultado=3'); // Si hay un resultado se redireciona al mensaje 3
         }
     }
 
     
 
 
     // Identificar y unir los atributos de la DB
     public function atributos(){
         $atributos = [];
         foreach(static::$columnasDB as $columna){
             if($columna ==='id') continue;
             $atributos[$columna] = $this->$columna; 
         }
         return $atributos;
     }
 
     public function sanitizarAtributos(){
         $atributos = $this->atributos();
         $sanitizado = [];
 
         foreach($atributos as $key => $value){
             $sanitizado[$key] = self::$db->escape_string($value);
         }
 
         return $sanitizado;
     }
 
     // Subida de archivos
     public function setImagen($imagen){
         // Elimina la imagen previa
         if(!is_null($this->id)){
            $this->borrarImagen();
         }
 
         // Asignar al atributo de imagen el nombre de la imagen
         if($imagen){
             $this->imagen = $imagen;
         }
     }
 
     // Eliminar Archivo
     public function borrarImagen(){
         // Comprobar si existe el archivo
         $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
         if($existeArchivo){
             unlink(CARPETA_IMAGENES . $this->imagen);
         }
     }
 
     //Validacion
     public static function getErrores(){
         return static::$errores;
     }
 
     public function validar(){
        static::$errores = [];
        return static::$errores;
 }
 
 // Lista todos los registros
 public static function all(){               
     $query = "SELECT * FROM " . static::$tabla; // Esta consulta se pasa al metodo consultarSQL
    

     $resultado = self::consultarSQL($query);
 
     return $resultado;
 
 }

 // obtiene determinado numero de registros
 public static function get($cantidad){               
    $query = "SELECT * FROM " . static::$tabla . " LIMIT ". $cantidad; 
   
    $resultado = self::consultarSQL($query);

    return $resultado;

}
 
 // Busca un registro por su id
 public static function find($id){
     $query= "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
 
     $resultado= self:: consultarSQL($query);
 
     return array_shift($resultado);
 }
 
 public static function consultarSQL($query){
     // Consultar la base de datos
     $resultado = self::$db->query($query);
 
     // Iterar los resultados
     $array = [];
     while($registro = $resultado->fetch_assoc()){ // trae un arreglo asociativo
         $array[] = static::crearObjeto($registro); // Crea un metodo que transforma el arreglo en objeto para active record
     }
 
     
     // Liberar la memoria
     $resultado->free();
 
 
     // Retornar los resultados
     return $array; // Retorna los array hechos objetos
 }
 
 protected static function crearObjeto($registro){
     $objeto = new static; // crea el objeto en la clase que se esta heredando
 
     foreach($registro as $key => $value){ //toma un arreglo que son los resultados de la DB y hace un objeto que hace de espejo con lo que hay en la DB
         if( property_exists( $objeto, $key)){ // comprueba los datos en cada iteracion de arreglo a objeto
             $objeto->$key = $value;
         } 
     }
 
     return $objeto;
 }
 
 // Sincroniza el objeto en memoria con los cambios realizados por el usuario
 public function sincronizar($args = []){
     foreach($args as $key => $value){ // key value como arreglo asociativo. recorre el arreglo y asigna del arreglo al objeto en memoria
         if(property_exists($this, $key ) && !is_null($value) ){ // property_exists Revisa que una propiedad en un objeto exista. // && !is_null($value) evita que al actualizar queden campos vacios(publicacion sin titulos)
             $this->$key = $value; // $key asigan automaticamente y evita asignaciones manuales
         } 
     }
 }
}