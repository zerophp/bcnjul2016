<?php
/**
 * Create element INPUT
 * 
 * @param string $type
 * @param string $label
 * @param string $name
 * @param array $options
 * @param array $default
 * @param array $decorator
 * @param string $hint 
 * @param string $id
 * @return string
 */


/*
'type'=>'select',
'label'=>'Ciudad:',
'name'=>'city',
'options'=>array('bcn'=>'Barcelona', 'grn'=>'Girona', 'lld'=>'Lleida'),
'defaults'=>array('bcn', 'grn'),
'value'=>array(),
'decorator'=>array('class'=>'class1 class2'),
'hint'=>'',
'id'=>'city',
*/


function elementcheck($type, $label, $name, $options, $default=array(), $decorator=array(), $hint="", $id="")
{
	$elementhtml="";
	
	if ($label!="")
		$elementhtml.=$label;
	
		foreach ($options as $key=>$value)
		{
		
			$elementhtml.=$value.":<input type=\"" . $type ."\" name=\"" . $name ."[]\" ";
			
			if ($id!="")
				$elementhtml.=" id=\"" . $id . "\"";
			
			if (!empty($decorator))
				foreach ($decorator as $keydecorator => $valuedecorator)
					$elementhtml.=$keydecorator ."=\"" . $valuedecorator . "\"";		
				
			if ($hint!="")
				$elementhtml.=" placeholder=\"" .$hint . "\"";
					
				
			if (in_array($key, $default))
				$elementhtml.= " checked ";
		
			
			$elementhtml.=" value = \"". $key. "\"/>\t";
	}
			
	
		
	return $elementhtml;
}