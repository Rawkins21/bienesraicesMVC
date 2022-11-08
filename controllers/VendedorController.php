<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController{
    public static function crear(Router $router){

        $errores = Vendedor::getErrores();

        $router-> render('vendedores/crear',[
            'errores' => $errores
        ]);
    }

    public static function actualizar(){
        echo "actualizar vendedor";
    }

    public static function borrar(){
        echo "borrar vendedor";
    }
}