<?php

/**
 * Validate input data
 * 
 * @param array $data
 * @return boolean
 */

function Validar($data, $form)
{
    $error = array();
    
    // Para cada elemento del array data
    // Tomar key y value
    foreach($data as $key => $value)
    {
        // Buscar en form por key la validacion
        $validations = $form[$key]['validation'];
        
        
        if(empty($validations))
            $val=TRUE;
        else
            $val = FALSE;
        
         //Para cada validacion
        foreach($validations as $validation)
        {
            
            // confirmar que value la cumple
            switch($validation['type'])   
            {
                case 'notnull':
                    // Validar que no es null
                    //$val = ValidateNotnull();
                    $val = true;
                break;
                case 'valmax':
                    // Validar tamañ maximo
                    //$val = valMax();
                    $val = true;
                break;
                case 'email':
                    // Validar que es un email
                    //$val = checkEmail();
                    $val = false;
                break;                
                case 'inarray':
                    // Validar que esta en el array
                    $val = in_array($value, $form[$key]['options']);
                break;
            }
            
            // Si la cumple
            // Continuar a la siguiente
            // Si no la cumple
            // añadir a un array de errores la key y el mensaje de error
            if($val === FALSE)
            {
                $error[$key][]=$validation['error'];
            }
            
        }
        
        
    }
        
    // retornar el array de errores
    if(!empty($error))
        return $error;
    else
        return TRUE;    
}