<?php

if(isset($_GET['controller']))
    $controller = $_GET['controller'];
    else
        $controller = 'crud';
    
switch ($controller)
{
    case 'crud':
        include("../modules/users/src/Users/Controller/Crud.php");
    break;
    case 'share':
        include("../modules/users/src/Users/Controller/Share.php");
    break;
            
}




