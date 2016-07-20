<?php

function ConnectDb($config)
{
    $link = mysqli_connect($config['host'],
        $config['user'],
        $config['password']);
    
    // Conectar a la DB
    mysqli_select_db($link, $config['database']);
    
    return $link;
}