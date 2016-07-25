<?php


require_once "../autoload.php";
require_once "../configs/autoload/configs.global.php";

// use Mandela\Model;

$router = Mandela\Model\FrontController::Router($_SERVER['REQUEST_URI'], $configs['router']);

echo "<pre>router";
print_r($router);
echo "</pre>";

$render = Mandela\Model\FrontController::Dispatch($router);

echo "<pre>render";
print_r($render);
echo "</pre>";

echo Mandela\Model\FrontController::Render($render);
