<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index(Router $router){
        
        $propiedades = Propiedad::all();
        
        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router){

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        // Arreglo con mensajes de Errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            /** Crea una nueva instancia  **/
            $propiedad = new Propiedad($_POST['propiedad']);
            
            // Generar un nombre unico y su extension
            $nombreImagen = md5( uniqid(rand(), true)) .  ".jpg";
        
            // Setear la imagen
            // Realiza un resize a la imagen con InterventionImage
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            
            // Validar
            $errores = $propiedad->validar();
        
            if(empty($errores)){
        
              // Crea la carpeta para subir imagenes en caso de que no exista y verifica su existencia para no volver a crearla
              if(!is_dir(CARPETA_IMAGENES)){
                  mkdir(CARPETA_IMAGENES);
              }
        
            //Guarda al imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        
            // Guarda en la base de datos
            $propiedad->crear();
        
        
        
        }
    }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
        ]);

    }

public static function actualizar(){
    echo "Actualizar Propiedad";
}

}