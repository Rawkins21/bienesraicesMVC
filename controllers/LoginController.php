<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{
    public static function login(router $router){
        
        $errores = [];

        $router->render('auth/login',[
            'errores' => $errores,
        ]);
    }

    public static function logout(){
        echo "desde logout";
        
    }
}