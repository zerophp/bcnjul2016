<?php

require_once ('../configs/autoload/database.global.php');
include_once ("../modules/users/src/Users/Model/Db/ConnectDb.php");
include_once ("../modules/users/src/Users/Model/Db/CloseDb.php");
include_once ("../modules/users/src/Users/Model/Adapter/Db/getDatasDatabase.php");
include_once ("../modules/users/src/Users/Model/Adapter/Db/insertUserDatabase.php");
include_once ("../modules/users/src/Users/Model/Adapter/Db/updateUserDatabase.php");
include_once ("../modules/users/src/Users/Model/Adapter/Db/getUserDatabase.php");
include_once ("../modules/users/src/Users/Model/Adapter/Db/deleteUserDatabase.php");

include_once ("../modules/users/src/Users/Model/View/DibujaTabla.php");
include_once ("../modules/users/src/Users/Model/formulario/createform.php");
include_once ("../modules/users/src/Users/Model/Form/User.php");


switch ($router['action'])
{
    case 'insert':
        if($_POST)
        {
            // Filtrar & Validar & Tokenizar
            $datas = $_POST;
            // Si Valido
            // Conectarme a DB
            $link = ConnectDb($db['master']);
            $result = insertUserDatabase($link, $datas);
            
            CloseDb($link);
            //Saltar a Select
            header("Location: /users/crud/select");
        }
        else 
        {
            
            ob_start();
            $view = createform($register,'POST',
                               '/users/crud/insert',
                               'registro');
            echo $view;
            $view = ob_get_contents();
            ob_end_clean();          
        }      
    break;
    
    case 'update':
        if($_POST)
        {
            $link = ConnectDb($db['master']);
            updateUserDatabase($link, $_POST, $_POST['iduser']);
            CloseDb($link);
            header("Location: /users/crud/select");
        }
        else
        {
            $link = ConnectDb($db['slave']);
            $user = getUserDatabase($link, $router['params']['iduser']);
            CloseDb($link);            
            
            
            ob_start();
                $view = createform($register,'POST',
                    '/users/crud/update',                
                    'registro', $user);
                echo $view; 
            $view = ob_get_contents();
            ob_end_clean();
            
            
        }
    break;
    
    case 'delete':
        if($_POST)
        {
            if($_POST['delete']=='si')
            {
                $link = ConnectDb($db['master']);
                deleteUserDatabase($link, $_POST['iduser']);
                CloseDb($link);      
                
            }
            //Saltar
            header('Location: /users/crud/select');
        }
        else
        {
            $link = ConnectDb($db['slave']);
            $user = getUserDatabase($link, $router['params']['iduser']);
            ob_start();
                include '../modules/users/views/users/crud/delete.phtml';
                $view = ob_get_contents();
            ob_end_clean();            
        }
    break;
    
    case 'select':
    default:
        $link = ConnectDb($db['slave']);
        $datas = getDatasDatabase($link, 'users');
        CloseDb($link);
        ob_start();
            echo DibujaTabla($datas);
            $view = ob_get_contents();
        ob_end_clean();
              
    break;        
        
}


$layout = "../modules/users/views/layouts/dashboard.phtml";
    
    
