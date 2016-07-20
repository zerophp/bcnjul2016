<?php

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'select';

switch ($action)
{
    case 'facebook':
        echo "estoy facebook";
    break;
    default:
    case 'twitter':
        echo "estoy twitter";
    break;
    
    case 'instagram':
        echo "estoy instagram";
    break;
    
    case 'select':    
        echo "estoy snapchat";
    break;
        
        
}