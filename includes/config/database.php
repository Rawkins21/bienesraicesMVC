<?php

function conectarDB(){
    $db = new mysqli('localhost', 'root', '1991', 'bienes_raices');
    $db->set_charset('utf8'); // fuerza el estandar utf-8 para solucionar errores de escritura como el uso de ñ 
    //  if($db) { 
    //      echo "se conecto";
    //  } else{
    //      echo "no se conecto";
    //   } comprobar si se conecto a la base de datos
    return $db;
}

