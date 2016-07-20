<?php


function insertUserDatabase($link, $data)
{

    $table = "users";
    $sql = "INSERT INTO ".$table." SET ";
    
    $insert = null;
    
        unset($data['enviar']);
        unset($data['languages']);
        unset($data['transport']);
        unset($data['city']);
        unset($data['gender']);
        $data ['genders_idgender']=1;
        $data ['cities_idcity']=1;
        $data['iduser']=time();
        
    foreach ($data as $key => $value)
    {
        $insert .= $key."=\"".$value."\","; 
    }
        
    if($insert != null)   
        $insert = substr($insert, 0, strlen($insert)-1);
    
    $sql .= $insert;
    
    $result = mysqli_query($link, $sql);
    
    return $result;
    
}