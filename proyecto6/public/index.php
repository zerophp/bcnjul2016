<?php



require_once "../configs/autoload/configs.global.php";
require_once "Router.php";
require_once "Dispatch.php";
require_once "Render.php";

$router = Router($_SERVER['REQUEST_URI'], $configs['router']);
$render = Dispatch($router);



echo Render($render);
