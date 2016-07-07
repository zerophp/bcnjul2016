<?php

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";


require_once "Filtrar.php";
require_once "user.php";
require_once "Validar.php";

$datos = Filtrar($_POST, $register);
$val = Validar($datos, $register);

echo "<pre>Post filter: ";
print_r($datos);
echo "</pre>";


echo "<pre>Validatio: ";
print_r($val);
echo "</pre>";



// die;


// if(Validar($datos) == OK)
// {
//     Procesar($datos)
// }
// else 
// {
//     Error($datos);    
// }




// Tokenizar

// Procesar