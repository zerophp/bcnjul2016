<?php

function getUserDatabase($link, $iduser)
{
    
    $rows = array();
    $sql = "SELECT * FROM users WHERE iduser= \"".$iduser."\"";
  
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result))
    {
        $rows[]=$row;        
    }
    return $rows[0];
    
    
}
