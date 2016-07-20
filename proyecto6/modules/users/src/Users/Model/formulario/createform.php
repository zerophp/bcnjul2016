<?php

/**
 * 
 * Create form
 * 
 * 
 * @param array $form Form definition
 * @return string html form
 */



function createform($form,$method,$action,$name, $values = array())
{
    if(!empty($values))
    {
        foreach ($form as $key => $value)
        {
            if(isset($values[$key]))
            if(!is_array($values))
                $form[$key]['defaults'] = $values[$key];
            else
                $form[$key]['defaults'] = array($values[$key]);
            
        }
    }
        
    $formhtml="<form name=\"" . $name . "\"".
                " action=\"" . $action . "\"".
                " method=\"" . $method . "\">";
     
    
	$formhtml.="<ul>";
	
	foreach ($form as $key => $valueform)
	{
		// Search form for the necessary keys
		
		$formhtml.="<li>";
		
		$type = $form[$key]["type"];
		$label = $form[$key]["label"];
		$name = $form[$key]["name"];
		$value = $form[$key]["value"];
		$id = $form[$key]["id"];
		$decorator = $form[$key]["decorator"];
		$hint = $form[$key]["hint"];
		
		$options = $form[$key]["options"];
		$default = $form[$key]["defaults"];
		
		
		switch ($type)
		{
			
			case "hidden":
			case "text":
			case "password":
			case "email":
				// Create element with type
				// <input type
				require_once 'elementinputtext.php';
				$formhtml.=elementinputtext($type,$label,$name,$default,$decorator,$hint,$id);
				
				break;
			
			case "select":
			
				// Create element with type
				// <select
				require_once 'elementselect.php';
				$formhtml.=elementselect($type, $label, $name, $options, $default, $decorator, $hint, $id);
				
				break;
				
			case "selectmultiple":
				require_once 'elementselectmultiple.php';
				$formhtml.=elementselectmultiple($type, $label, $name, $options, $default, $decorator, $hint, $id);
				break;
				
			case "radio":
				require_once 'elementradio.php';
				$formhtml.=elementradio($type, $label, $name, $options, $default, $decorator, $hint, $id);
				break;
			
			case "checkbox":
				require_once 'elementcheck.php';
				$formhtml.=elementcheck($type, $label, $name, $options, $default, $decorator, $hint, $id);
				break;
				
			case "textarea":
				require_once 'elementtextarea.php';
				$formhtml.=elementtextarea($type, $label, $name, $default, $decorator, $hint, $id);
				break;
				
				
		}
		
		$formhtml.="</li>";
		
	}
		
	$formhtml.="<li>";
	$formhtml.="<input type=\"submit\" name=\"enviar\" value=\"Enviar\"/>";
	$formhtml.="</li>";
	
		
	$formhtml.="</ul>";
	
	$formhtml.="</form>";
	
	return $formhtml;
}