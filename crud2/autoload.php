<?php 

function __autoload($class)
{
    
    $class = explode("\\", $class);
  
    $class = strtolower($class[0])."/src/".$class[0]."/".$class[1]."/".$class[2].".php";
    
    if(file_exists("../modules/".$class))
        include_once "../modules/".$class;
    elseif(file_exists("../vendor/".$class))
        include_once "../vendor/".$class;
    else
    {
        echo "<pre>Autoload: ";
        print_r($class);
        echo "</pre>";
    }
        
}