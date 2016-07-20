<?php


$layout = "../modules/application/views/layouts/jumbotron.phtml";

switch ($router['action'])
{
    case 'index':
        ob_start();
            
            $view = ob_get_contents();
        ob_end_clean();
        break;
}

 