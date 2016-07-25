<?php 

function Dispatch($router)
{
    include("../modules/".$router['module'].
            "/src/".ucfirst($router['module']).
            "/Controller/".ucfirst($router['controller']).".php");
    
    return array('layout'=>$layout,
                 'view'=>$view);
}