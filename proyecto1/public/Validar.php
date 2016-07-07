<?php

/**
 * Validate input data
 * 
 * @param array $data
 * @return boolean
 */

function Validar($data, $form)
{
    
    Para cada elemento del array data
        Tomar key y value
            Buscar en form por key la validacion
            Para cada validacion 
                confirmar que value la cumple
                    Si la cumple
                        Continuar a la siguiente 
                    Si no la cumple
                        añadir a un array de errores la key y el mensaje de error
    retornar el array de errores
    
    return TRUE|ARRAY;
}