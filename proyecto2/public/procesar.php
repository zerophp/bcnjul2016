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
foreach ($datos as $key => $data)
{
    // Si es multiple
    if(is_array($data))
    {
        // Concatenar por comas
        $datos[$key] = implode(',',$data);
    }    
}
//     Concatenar los elementos por pipe
// $datos['description'] = serialize($datos['description']);

$datos['description'] = htmlentities($datos['description']);
$datos = implode('|', $datos);


// Agregar la linea al final de el archivo
file_put_contents('users.txt', $datos."\n", FILE_APPEND);


// $handle = fopen($filename, $mode)
// fwrite($handle, $string)
// fclose($handle);




    
    