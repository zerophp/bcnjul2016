<?php

/**
 * Get datas as array from table using link connection
 * 
 * @param resource $link
 * @param string $table
 * @return array[]
 */
function getDatasDatabase($link, $table)
{
    // Creaar una consulta
    $query = "SELECT * FROM ".$table;
    
    // Ejecutar la consulta
    $result = mysqli_query($link, $query);
    
    // Recorrer el recodset
    $datas = array();
//     while($row = mysqli_fetch_assoc($result))
    while($row = mysqli_fetch_array($result))
    {    
        $datas[]=$row;
    }
    
    return $datas;
}