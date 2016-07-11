<?php

function Procesar($datas)
{
    require_once "../vendor/mandela/formulario/Filtrar.php";
    require_once "../modules/forms/user.php";
    // require_once "Validar.php";
    
    $datos = Filtrar($datas, $register);
    // $val = Validar($datos, $register);
       
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
    file_put_contents('../data/users.txt', $datos."\n", FILE_APPEND);
    
    
    // $handle = fopen($filename, $mode)
    // fwrite($handle, $string)
    // fclose($handle);
}