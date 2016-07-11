<?php
/**
 * Create element TEXTAREA
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


function elementtextarea($type, $label, $name, $value=array(), $decorator=array(), $hint="", $id="")
{
	$elementhtml="";
	
	if ($label!="")
		$elementhtml.=$label;
	
	$elementhtml.="<textarea name=\"" . $name ."\" ";
	
	
	if ($id!="")
		$elementhtml.=" id=\"" .$id . "\" ";
	
	if (!empty($decorator))
		foreach ($decorator as $keydecorator => $valuedecorator)
			$elementhtml.=$keydecorator ." = \"" . $valuedecorator . "\" ";		
		
//	if ($hint!="")
//		$elementhtml.=" placeholder=\"" .$hint . "\"";
					
			
	$elementhtml.=">";
		
	if (!empty($value))
		$elementhtml.=$value[0];
	
		
	$elementhtml.='</textarea>';	
	
	return $elementhtml;
}