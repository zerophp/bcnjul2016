<?php

/**
 * Form users.
 */


require_once 'user.php';

require_once 'createform.php';

/*
echo "<form name=\"formulario\" 
      action=\"procesar.php\" 
      method=\"post\" 
      enctype=\"multipart/form-data\">". 
		createform($register) . 
	"</form>";
*/

echo createform($register, "post", "procesar.php", "formulario");
