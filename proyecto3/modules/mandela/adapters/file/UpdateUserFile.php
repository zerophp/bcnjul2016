<?php

/**
 * Update user file 
 * 
 * @param int $id file number
 * @param array $data
 * @param string $file
 */
function UpdateUserFile($id, $data, $file)
{    
    //Generar string data
    foreach ($data as $key => $value)
    {
        if(is_array($value))
        {
            //Para cada array de data concatenar por comas
            $data[$key] = implode(",", $value);
        }
    }
    // concatenar por pipes
    $data = implode("|", $data); 
    
    //Leer el archivo en un string
    $users = file_get_contents($file);
    
    //Separar por saltos de linea en un array 
    $users = explode("\n", $users);
        
    //Reemplazar user ID por string data
    $users[$id]=$data;
    
    //Concatenar por saltos de linea
    $users = implode("\n", $users);
    
    //Escribir el fichero
    file_put_contents($file, $users);
    
    return TRUE;
}