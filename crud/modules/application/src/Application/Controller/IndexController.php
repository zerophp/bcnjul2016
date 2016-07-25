<?php

class IndexController
{
    var $layout = "../modules/application/views/layouts/jumbotron.phtml";
    
    public function indexAction()
    {
        ob_start();
        
        $view = ob_get_contents();
        ob_end_clean();
        
        return $view;
    }
    
    public function otroMetodo()
    {
        
    }
    
    
    
    
}