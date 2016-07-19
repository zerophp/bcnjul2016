<?php
/**
 * Create element INPUT
 * 
 * @param string $type
 * @param string $label
 * @param string $name
 * @param array $value
 * @param array $decorator
 * @param string hint
 * @param string $id
 * @return string
 */


function elementinputtext($type, $label, $name, $value=array(), $decorator=array(), $hint="", $id="")
{
	$elementhtml="";
	
	if ($label!="")
		$elementhtml.=$label;
	
	$elementhtml.="<input type=\"" . $type . "\" name=\"" . $name ."\" ";
	
	if (!empty($value))
		$elementhtml.=" value=\"" .$value[0] . "\" ";
	
	if ($id!="")
		$elementhtml.=" id=\"" .$id . "\" ";
	
	if (!empty($decorator))
		foreach ($decorator as $keydecorator => $valuedecorator)
			$elementhtml.=$keydecorator ." = \"" . $valuedecorator . "\" ";		
		
	if ($hint!="")
		$elementhtml.=" placeholder=\"" .$hint . "\"";
					
			
	$elementhtml.="/>";
		
	return $elementhtml;
}