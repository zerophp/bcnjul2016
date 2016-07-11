<?php

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

require_once "Filtrar.php";
require_once "user.php";
// require_once "Validar.php";

$datos = Filtrar($_POST, $register);
// $val = Validar($datos, $register);

echo "<pre>Datos: ";
print_r($datos);
echo "</pre>";


// Para cada elemento del array DATOS  
//     Si es multiple 
//         Concatenar por comas
        
//     Concatenar los elementos por pipe
    
// Agregar la linea al final de el archivo
    

    
    