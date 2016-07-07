<?php

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

echo "<pre>";
print_r($_POST);
echo "</pre>";

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";


require_once "Filtrar.php";

$form = array(
    'id' => array(
        'type'=>'hidden',
        'label'=>'',
        'name'=>'',
        'value'=>array(),
        'decorator'=>'',
        'hint'=>'',
        'filters'=>array(),
        'id'=>'',
        'errors'=>array(),
    ),
);

$dato=array('id'=>2);

$datos = Filtrar($dato, $form);


// echo "<pre>";
// print_r($datos);
// echo "</pre>";


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