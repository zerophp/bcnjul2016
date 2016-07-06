<?php

// $user = array();
$user = array('Agustin', 'Calderon', 'agustincl@gmail.com');

echo "<pre>";
print_r($user);
echo "</pre>";

$user2 = array('nombre'=>'Sebastian',
               'apellidos'=>'Calderon',
               'email'=>'sebastiancl@gmail.com'
);

echo "<pre>";
print_r($user2);
echo "</pre>";


foreach($user as $key => $value)
{
    echo $key.": ".$value;
    echo "<br/>";
}

foreach($user2 as $value)
{
    echo $value;
    echo "<br/>";
}



$users = array($user, $user2);


echo "<hr/>";
echo $users[0][2];
echo $users[1]['email'];


echo "<hr/>";
echo "<hr/>";


$user3 = array (
    'nombre' => 'Benjamin',
    'apellido' => 'Calderon',
    'email' => 'benajmincl@gmail.com',
    44 => 'valor1',
    'valor2',
    'otro mas',
    8 => 'unomas',
    'siguiente',
    5,7=>'jajaja',
    FALSE => 'jijijiji',
    1=>'mas',
    TRUE => 'lerolero',
    7<<8=>'VALOR',
    0=>'machaca',
    '8.9'=>'que pasa',
    '50.1'=> 'jaja2',
    'jaja3',
    '50.1'=>'asdklñj'
    
    
);

echo "<pre>";
print_r($user3);
echo "</pre>";



foreach($user3 as $key => $value)
{
    echo $key.": ".$value;
    echo "<br/>";
}










