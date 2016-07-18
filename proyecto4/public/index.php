<?php

require_once '../configs/database.global.php';

// Conectar al DBMS
$master = mysqli_connect($db['master']['host'], 
                       $db['master']['user'], 
                       $db['master']['password']);

$slave = mysqli_connect($db['slave']['host'],
    $db['slave']['user'],
    $db['slave']['password']);

// Conectar a la DB
mysqli_select_db($master, $db['master']['database']);
mysqli_select_db($slave, $db['slave']['database']);

// Creaar una consulta
$query = "SELECT * FROM users";

// Lanzar la consulta
$result = mysqli_query($master, $query);

echo "<pre>";
print_r($result);
echo "</pre>";

// die;
// Si LECTURA

    // Obtener Recordset
$users = array();
    while($row = mysqli_fetch_assoc($result))
    {
        
        $users[]=$row;
    }

    echo "<pre>";
    print_r($users);
    echo "</pre>";
    // Visualizar Recordset

    
    
$query = "INSERT INTO users SET iduser='a1',
                                name='".'jjj'."',
                                email='".'a1@jjj.com'."',
                                password='".'iusadyuiasd'."',
                                description='".'my desc'."',
                                photo='".'sinfoto.jpg'."',
                                genders_idgender=".'2'.",
                                cities_idcity=".'2'."";

$result = mysqli_query($master, $query);


$query = "UPDATE users 
          SET name='".'User a1'."'
          WHERE iduser='".'a1'."'";
                          
$result = mysqli_query($master, $query);

echo "<pre>";
var_dump($result);
echo "</pre>";
     


$query = "DELETE FROM users
          WHERE iduser='".'iduser'."'";

$result = mysqli_query($master, $query);

echo "<pre>";
var_dump($result);
echo "</pre>";
// Si MODIFICAR

    // El numero de filas afectadas
    $numAffectedRows = mysqli_affected_rows($master);
    echo $numAffectedRows;

    // Si es INSERT
    
        // Last Insert ID (si id autonumeric)
        
    
    
    