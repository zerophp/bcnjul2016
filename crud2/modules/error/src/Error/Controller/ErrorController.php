<?php
namespace Error\Controller;

class ErrorController
{
    var $layout = 'error';
    
    public function indexAction()
    {
        return null;
    }
    
    public function _404Action()
    {
        header("HTTP/1.0 404 Not Found");
        return "Error 404";
    }
    
    public function _303Action()
    {
        header("HTTP/1.0 303 Redirect");
        return "Error 303";
    }
    
    public function _500Action()
    {
        header("HTTP/1.0 500 Server Error");
        return "Error 500";
    }
}

