<?php

require_once "../autoload.php";

if(isset($_SERVER['application_env'] )&&
    $_SERVER['application_env']=='production')    
    $config = 'production.config.php';
else
    $config = 'development.config.php';

//     echo getcwd();
    
chdir("..");
$APPLICATION_PATH = getcwd();


define("APPLICATION_PATH",$APPLICATION_PATH);
    
// use Mandela\Model;

$config = Mandela\FrontController\FrontController::Config($config);

echo "<pre>configs: ";
print_r($config);
echo "</pre>";

$router = Mandela\FrontController\FrontController::Router($_SERVER['REQUEST_URI'], 
                                                          $config['router']);

echo "<pre>router: ";
print_r($router);
echo "</pre>";

$render = Mandela\FrontController\FrontController::Dispatch($router);

echo "<pre>render: ";
print_r($render);
echo "</pre>";

echo Mandela\FrontController\FrontController::Render($render);
