<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class VendedorController{
    public static function crear(Router $router){

        $errores = Vendedor::getErrores();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $vendedor = new Vendedor($_POST['vendedor']);
        
             // Generar un nombre unico y su extension
             $nombreImagen = md5( uniqid(rand(), true)) .  ".jpg";
        
             // Setear la imagen
             // Realiza un resize a la imagen con InterventionImage
             if($_FILES['vendedor']['tmp_name']['imagen']){
                 $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800,600);
                 $vendedor->setImagen($nombreImagen);
             }
             
               // Validar
            $errores = $vendedor->validar();
         
             if(empty($errores)){
        
             
         
               // Crea la carpeta para subir imagenes en caso de que no exista y verifica su existencia para no volver a crearla
               if(!is_dir(CARPETA_IMAGENES)){
                   mkdir(CARPETA_IMAGENES);
               }
         
             //Guarda al imagen en el servidor
             $image->save(CARPETA_IMAGENES . $nombreImagen);
         
               
             // Guarda en la base de datos
             $vendedor->crear();
        }
    }

        $vendedor = new Vendedor;

        $router-> render('vendedores/crear',[
            'errores' => $errores,
            'vendedor'=> $vendedor
        ]);
    }

    public static function actualizar(Router $router){

        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/public/admin');

        // Obtener datos del vendedores a actualizar
        $vendedor = vendedor::find($id);

            // Metodo POST para actualizar
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){


                // Asignar los atributos
                $args = $_POST['propiedad'];
            
                $vendedor->sincronizar($args);
            
                // Validacion
             $errores = $vendedor->validar();
            
                // Subida de archivos
                    // Generar un nombre unico y su extension
                 $nombreImagen = md5( uniqid(rand(), true)) .  ".jpg";
            
                if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $vendedor->setImagen($nombreImagen);
              }
            
             //Revisar que el arreglo de $errores este vacio
             if(empty($errores)){
                 // Almacenar la imagen
                    if($_FILES['propiedad']['tmp_name']['imagen']) {
                     $image->save(CARPETA_IMAGENES . $nombreImagen);
             }
                $vendedor->guardar();
            
             }
             }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function borrar(){
        echo "borrar vendedor";
    }
}