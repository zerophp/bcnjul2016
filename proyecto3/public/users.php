<?php

if(isset($_GET['action']))
    $action =$_GET['action'];
else
    $action = 'Select';

    
require_once '../modules/users/src/Users/Model/Procesar.php';
require_once '../vendor/mandela/formulario/createform.php';
require_once '../modules/users/src/Users/Model/Form/User.php';
require_once '../vendor/mandela/DibujaTabla.php';
require_once '../vendor/mandela/adapters/file/GetUserFile.php';
require_once '../vendor/mandela/adapters/file/UpdateUserFile.php';

switch ($action)
{
    case 'Insert':
        if($_POST)
        {
            //Procesar            
            Procesar($_POST);
            // Saltar
            header('Location: /users.php');            
        }            
        else
        {
            // Mostrar formulario vacio                        
            $html = createform($register,'POST','users.php?action=Insert','registro');
            echo $html;
        }        
    break;
    case 'Update':
        echo "Estas en update";
        if($_POST)
        {
            UpdateUserFile($_GET['id'],$_POST,'../data/users.txt');
            header('Location: /users.php');
        }
        else
        {
            $user = GetUserFile($_GET['id'], '../data/users.txt');
            
            echo "<pre>";
            print_r($user);
            echo "</pre>";
            
            $user = array (
                'id'=>array($user[0]),
                'name'=>array($user[1]),
                'password'=>array($user[2]),
                'email'=>array($user[3]),
                'description'=>array($user[4]),
                'city'=>array($user[5]),
                'languages'=>explode(",",$user[6]),
                'gender'=>array($user[7]),
                'transport'=>array($user[8]),                
            );
            
            $html = createform($register,'POST','users.php?action=Update&id='.$_GET['id'],'registro', $user);
            echo $html;
        }
    break;
    case 'Delete':
        echo "Estas en delete";
        if($_POST)
        {
            if($_POST['delete']=='si')
            {
                //                 Procesar($datas)
                // Leer los datos del fichero en un string
                $users = file_get_contents('../data/users.txt');
    
                //separar por salto de linea en un array
                $users = explode("\n", $users);
                
                // Borrar el usuario ID del array
                unset($users[$_GET['id']]);
                
                // Concatenar el array por saltos de linea
                $users = implode("\n", $users);
    
                // Escribir en el fichero
                file_put_contents('../data/users.txt', $users);
            }

            //Saltar
            header('Location: /users.php');          
               
        }
        else
        {
            $user = GetUserFile($_GET['id'], '../data/users.txt'); 
            // Mostrar Formulario
            ob_start();
                include '../modules/users/views/users/delete.phtml';
                $view = ob_get_contents();
            ob_end_clean();
            
            echo $view;
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
        echo DibujaTabla($users);
    break;
}