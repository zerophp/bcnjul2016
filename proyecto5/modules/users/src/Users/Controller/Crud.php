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



if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'select';

switch ($action)
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
            header("Location: /index.php");
        }
        else 
        {
            $html = createform($register,'POST',
                               'index.php?controller=crud&action=insert',
                               'registro');
            echo $html;
            die;
        }      
    break;
    
    case 'update':
        if($_POST)
        {
            $link = ConnectDb($db['master']);
            updateUserDatabase($link, $_POST, $_POST['iduser']);
            CloseDb($link);
            header("Location: /index.php");
        }
        else
        {
            $link = ConnectDb($db['slave']);
            $user = getUserDatabase($link, $_GET['iduser']);
            CloseDb($link);            
            $html = createform($register,'POST',
                'index.php?controller=crud&action=update',
                'registro', $user);
            echo $html;
            
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
            header('Location: /index.php');
        }
        else
        {
            $link = ConnectDb($db['slave']);
            $user = getUserDatabase($link, $_GET['iduser']);
            ob_start();
                include '../modules/users/views/users/crud/delete.phtml';
                $view = ob_get_contents();
            ob_end_clean();
            echo $view;
        }
    break;
    
    case 'select':
    default:
        $link = ConnectDb($db['slave']);
        $datas = getDatasDatabase($link, 'users');
        CloseDb($link);
        echo DibujaTabla($datas);
    break;        
        
}