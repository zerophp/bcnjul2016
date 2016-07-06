<?php

/*
 * Comentario multilinea
 */

/**
 * Filter the input data
 * 
 * @param array $data
 * @param array $form Form definition
 * @return array
 */


 function Filtrar($data, $form)
 {
     //Para cada elemento del array $data
     //Tomar la key y el value
     foreach($data as $key => $value)
     {
         // Tomar form[key][filter]
         //  Para cada filter 
        foreach($form[$key]['filters'] as $filter)
        {
            // aplicarlo incrementalmente sobre value
            switch ($filter) 
            {
                case 'space':
                    $value = trim($value);                    
                break;
                case 'tags':
                    $value = strip_tags($value);
                break;                
            }            
        }
        // Guardar el value filtrado en el array data
        $data[$key] = $value;
     }
     // Retornar data
     return $data;
 }
 
 
 
 