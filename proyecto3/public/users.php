<?php

if(isset($_GET['action']))
    $action =$_GET['action'];
else
    $action = 'Select';

switch ($action)
{
    case 'Insert':
        if($_POST)
        {
            //Procesar
            require '../modules/users/models/Procesar.php';
            Procesar($_POST);
            // Saltar
            header('Location: /users.php');            
        }            
        else
        {
            // Mostrar formulario vacio
            require "../vendor/mandela/formulario/createform.php";
            require "../modules/forms/user.php";            
            $html = createform($register,'POST','users.php?action=Insert','registro');
            echo $html;
        }        
    break;
    case 'Update':
        echo "Estas en update";
    break;
    case 'Delete':
        echo "Estas en delete";
        if($_POST)
        {
//             if(SI)
//                 Procesar($datas)            
//             Saltar
               
        }
        else
        {
            // Leer los datos del usuario ID
            // Mostrar Formulario
        }
    break;
    case 'Select':
    default:
        echo "Estas en select";
        echo "<a href=\"users.php?action=Insert\">Insertar</a>";        
        
        // Leer fichero users.txt y guardarlo en un string
        $users = file_get_contents('../data/users.txt');
        
        // Separar por saltos de linea y guardarlo en un array
        $users = explode("\n", $users);
        
        // Para cada elemento del array separarlo por pipes
        foreach ($users as $key=>$user)
        {
            $users[$key] = explode("|", $user);
        }
        // Dibujar tabla a partir de una matriz
        require '../vendor/mandela/DibujaTabla.php';
        echo DibujaTabla($users);
    break;
}