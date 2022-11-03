<?php

define('TEMPLATES_URL', __DIR__ . '/templates'); // DIR trae la ubicacion especifica del directorio
define('FUNCIONES_URL', __DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/public/imagenes/');


function incluirTemplate( string $nombre, bool $inicio = false ){ // $inicio = false se asigna por defecto si la clase inicio no esta presente, agrega la clase inicio a la pagina si esta presente
    
    include TEMPLATES_URL."/${nombre}.php";
}

function estaAutenticado()  {
    session_start();
    
    if(!$_SESSION['login']){
        header('Location: /');
    }

    
}


function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function sanitizar($html) : string { // Devuelve un string
    $sanitizar = htmlspecialchars($html);
    return $sanitizar;
}

// Validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos); //  in_array buscar un string o un valor dentro de un arreglo
}

// Muestra los mensajes
function mostrarNotificacion($codigo){
    $mensaje = '';

    switch($codigo){
        case 1: 
            $mensaje = 'Creado Correctamente';
            break;
        case 2: 
            $mensaje = 'Actualizado Correctamente';
            break;    
        case 3: 
            $mensaje = 'Eliminado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url){
    // Validar la URL por ID valido
 $id = $_GET['id'];
 $id = filter_var($id, FILTER_VALIDATE_INT); //Validar la variable id con INT

  if(!$id){ // validacion para evitar problemas de capa8 con la url
     header("Location: ${url}");
  }

  return $id;
}