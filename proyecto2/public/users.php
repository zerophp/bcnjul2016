<!-- Boton insert -->
<a href="formulario.php">Insertar</a>

<?php

// Leer fichero users.txt y guardarlo en un string
$users = file_get_contents('users.txt');

// Separar por saltos de linea y guardarlo en un array
$users = explode("\n", $users);

// Para cada elemento del array separarlo por pipes
foreach ($users as $key=>$user)
{
    $users[$key] = explode("|", $user);
}
// Dibujar tabla a partir de una matriz    
require 'DibujaTabla.php';
echo DibujaTabla($users);
