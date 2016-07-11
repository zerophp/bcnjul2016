<?php 
require "formulario/createform.php";
require "user.php";

$html = createform($register,'POST','procesar.php','registro');
echo $html;




