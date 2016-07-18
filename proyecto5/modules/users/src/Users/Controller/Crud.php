<?php

require_once ('../configs/autoload/database.global.php');
include_once ("../modules/users/src/Users/Model/Db/ConnectDb.php");
include_once ("../modules/users/src/Users/Model/Adapter/Db/getDatasDatabase.php");
include_once ("../modules/users/src/Users/Model/View/DibujaTabla.php");

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'select';

switch ($action)
{
    case 'insert':
        echo "estoy insert";
    break;
    
    case 'update':
        echo "estoy update";
    break;
    
    case 'delete':
        echo "estoy delete";
    break;
    
    case 'select':
    default:
        $link = ConnectDb($db['slave']);
        $datas = getDatasDatabase($link, 'users');
        echo DibujaTabla($datas);
    break;
        
        
}