<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
class PaginasController{
    public static function index(Router $router){
        
        $propiedades = Propiedad::get(3);
        $inicio = true;
        
        $router-> render('/paginas/index',[
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
       
        $router-> render('/paginas/nosotros',[
        ]);

    }

    public static function propiedades(Router $router){

        $propiedades = Propiedad::all();

        $router-> render('/paginas/propiedades',[
            'propiedades' => $propiedades
        ]);
        
    }

    public static function propiedad(Router $router){
        
        $id = validarORedireccionar('/public/propiedades');

        // buscar la propiedad por su id
        $propiedad = Propiedad::find($id);

        $router-> render('/paginas/propiedad',[
            'propiedad' => $propiedad
        ]);
        
    }

    public static function blog(Router $router){
        
        $router->render('/paginas/blog');
        
    }

    public static function entrada(Router $router){
        
        $router->render('/paginas/entrada');
        
    }

    public static function contacto(Router $router){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            

            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPauth = true;
            $mail->Username = '31aff57a37243f';
            $mail->Password = 'cc02b86a9dd140';
            $mail->SMTPSecure = 'tls'; // Transport Layer Security
            $mail->Port = 2525;

            // Configurar el contenido del mail
            $mail->setFrom('admin@bieneraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject= 'Tienes un Nuevo Mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet= 'UTF-8';
            
            // Definir el contenido
            $contenido = '<html> <p>Tienes un nuevo mensaje</p> </html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            // Enviar el email
            if($mail->send()){
                echo 'mensaje enviado Correctamente';
            } else {
                echo 'mensaje no enviado';
            }
        }

        $router-> render('/paginas/contacto',[

        ]);

        
    }

}