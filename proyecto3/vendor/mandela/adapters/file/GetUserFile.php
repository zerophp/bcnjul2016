<?php

/**
 * Get user from txt file
 * 
 * @param int $id Line number
 * @param string $file Filename
 * @return array $user
 */
function GetUserFile($id, $file)
{
    // Leer los datos del usuario ID
    
    //Leer los datos del fichero en un string
    $users = file_get_contents($file);
    
    //separar por salto de linea en un array
    $users = explode("\n", $users);
    
    //Tomar el usuario ID del array
    $user = $users[$id];
    
    // Separar usuario ID por pipes en dataUser
    $user = explode('|', $user);
    
    return $user;    
}