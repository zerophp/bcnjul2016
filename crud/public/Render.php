<?php 

function Render($render)
{
    $content = $render['view'];
    
//     ob_start();
//         include('../modules/users/views/layouts/partials/menu.phtml');
//         $menu = ob_get_contents();
//     ob_end_clean();
    
    ob_start();
        include('../modules/users/views/layouts/partials/navigator.phtml');
        $navigator = ob_get_contents();
    ob_end_clean();
    
    ob_start();
        include($render['layout']);
        $layout = ob_get_contents();
    ob_end_clean();
    
    return $layout;
    
}