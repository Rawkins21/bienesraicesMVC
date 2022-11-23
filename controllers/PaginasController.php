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
            
            $respuestas = $_POST['contacto'];
        
            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
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
            
            debuguear($respuestas);

            // Definir el contenido
             $contenido = '<html>';
             $contenido .= '<p>Tienes un nuevo mensaje</p>'; // .= concatena con la linea anterior
             $contenido .= '<p>Nombre: ' .  $respuestas['nombre']  . ' </p>'; 

            // Enviar de forma condicional algunos campos de email o telefono
            if($respuestas['contacto'] === 'telefono') {
            $contenido .= '<p>Eligió ser contactado por teléfono:</p>';

            } else{
            // es email, agregamos el campo de email
            $contenido .= '<p>Eligió ser contactado por email:</p>';
            $contenido .= '<p>Email: ' .  $respuestas['email']  . ' </p>'; 
            }
             $contenido .= '<p>Teléfono: ' .  $respuestas['telefono']  . ' </p>'; 
             $contenido .= '<p>Mensaje: ' .  $respuestas['mensaje']  . ' </p>'; 
             $contenido .= '<p>Vende o Compra: ' .  $respuestas['tipo']  . ' </p>'; 
             $contenido .= '<p>Precio o Presupuesto:  $' .  $respuestas['precio']  . ' </p>'; 
             $contenido .= '<p>Prefiere ser contactado por: ' .  $respuestas['contacto']  . ' </p>'; 
             $contenido .= '<p>Fecha de Contacto: ' .  $respuestas['fecha']  . ' </p>'; 
             $contenido .= '<p>Hora de Contacto: ' .  $respuestas['hora']  . ' </p>'; 


             $contenido .= '</html>';  
      

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML'; // Para servicios de Email que no soportan HTML


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

