<?php

/**
 * Form elements definition
 * 
 * @example 
 * 'element-n' => array(
 *      'type'=>(hidden|text|pasword|radio|checkbox|select|selectmultiple|textarea),
 *      'label'=>[string],
 *      'name'=>(string),
 *      'options'=>array('key'=>'value',..),
 *      'defaults'=>array('key',..),
 *      'value'=>array('key,..'),
 *      'decorator'=>array('key'=>'value',..),
 *      'hint'=>[string],
 *      'id'=>[string],
 *      'filters'=>array('filter',..),
 *      'validation'=>array(array('type'=>(string),'error'=>(string), options=>[array('key'=>'value',..)]),array(),..),           
 *  ),
 */


$register = array(
    'id' => array(
        'type'=>'hidden',
        'label'=>'Id:',
        'name'=>'id',
        'options'=>array(),
        'defaults'=>array('1'),
        'value'=>array(),
        'decorator'=>array(),
        'hint'=>'',
        'id'=>'id',
        'filters'=>array('spaces', 'tags'),
        'validation'=>array(
                        array(
                            'type'=>'notnull',
                            'error'=>'El valor no puede estar vacio',
                            'options'=>array()
                        )
                    ),
    ),
    'name' => array(
        'type'=>'text',
        'label'=>'Nombre:',
        'name'=>'name',
        'options'=>array(),
        'defaults'=>array(),
        'value'=>array(),
        'decorator'=>array(),
        'hint'=>'',
        'id'=>'name',
        'filters'=>array('spaces','tags'),
        'validation'=>array(
                        array(
                            'type'=>'notnull',
                            'error'=>'El valor no puede estar vacio',
                            'options'=>array()
                        ),
                        array(
                            'type'=>'valmax',
                            'error'=>'El valor no puede exeder %s caracteres',
                            'options'=>array('max'=>10)
                        )
                    ),
    ),
    'password' => array(
        'type'=>'password',
        'label'=>'Contraseña:',
        'name'=>'password',
        'options'=>array(),
        'defaults'=>array(),
        'value'=>array(),
        'decorator'=>array(),
        'hint'=>'',
        'id'=>'password',
        'filters'=>array('spaces','tags'),
        'validation'=>array(
                        array(
                            'type'=>'notnull',
                            'error'=>'El valor no puede estar vacio',
                            'options'=>array()
                        ),
                        array(
                            'type'=>'valmin',
                            'error'=>'El valor no puede tener menos de %s caracteres',
                            'options'=>array('max'=>10)
                        )
                    ),
    ),
    'email' => array(
        'type'=>'email',
        'label'=>'Email:',
        'name'=>'email',
        'options'=>array(),
        'defaults'=>array(),
        'value'=>array(),
        'decorator'=>array(),
        'hint'=>'',
        'id'=>'email',
        'filters'=>array('spaces','tags'),
        'validation'=>array(
                        array(
                            'type'=>'notnull',
                            'error'=>'El valor no puede estar vacio',
                            'options'=>array()
                        ),
                        array(
                            'type'=>'email',
                            'error'=>'El valor no es un email valido',
                            'options'=>array()
                        )
                    ),
    ),
    'description' => array(
        'type'=>'textarea',
        'label'=>'Descripcion:',
        'name'=>'description',
        'options'=>array(),
        'defaults'=>array(),
        'value'=>array(),
        'decorator'=>array(),
        'hint'=>'',
        'id'=>'description',
        'filters'=>array('spaces','tags'),
        'validation'=>array(),
    ),
    'city' => array(
        'type'=>'select',
        'label'=>'Ciudad:',
        'name'=>'city',
        'options'=>array('bcn'=>'Barcelona', 'grn'=>'Girona', 'lld'=>'Lleida'),
        'defaults'=>array('bcn', 'grn'),
        'value'=>array(),
        'decorator'=>array('class'=>'class1 class2'),
        'hint'=>'',
        'id'=>'city',
        'filters'=>array(),
        'validation'=>array(            
                    array(
                            'type'=>'inarray',
                            'error'=>'No esta en la lista de opciones',
                            'options'=>array()
                        ),                  
        ),
    ),
    'languages' => array(
        'type'=>'selectmultiple',
        'label'=>'Idiomas:',
        'name'=>'languages',
        'options'=>array('eng'=>'Ingles', 'esp'=>'Castellano', 'cat'=>'Català'),
        'defaults'=>array('eng','cat'),
        'value'=>array(),
        'decorator'=>array('class'=>'class1 class2'),
        'hint'=>'',
        'id'=>'languages',
        'filters'=>array(),
        'validation'=>array(            
                    array(
                            'type'=>'inarray',
                            'error'=>'No esta en la lista de opciones',
                            'options'=>array()
                        ),                  
        ),
    ),
    'gender' => array(
        'type'=>'radio',
        'label'=>'Sexo:',
        'name'=>'gender',
        'options'=>array('m'=>'Mujer', 'h'=>'Hombre', 'o'=>'Otros'),
        'defaults'=>array('o'),
        'value'=>array(),
        'decorator'=>array(),
        'hint'=>'',
        'id'=>'gender',
        'filters'=>array(),
        'validation'=>array(            
                    array(
                            'type'=>'inarray',
                            'error'=>'No esta en la lista de opciones',
                            'options'=>array()
                        ),                  
        ),
    ),
    'transports' => array(
        'type'=>'checkbox',
        'label'=>'Transportes:',
        'name'=>'transports',
        'options'=>array('car'=>'Coche', 'bike'=>'Bici', 'motor'=>'Moto'),
        'defaults'=>array(),
        'value'=>array(),
        'decorator'=>array(),
        'hint'=>'',
        'id'=>'transports',
        'filters'=>array(),
        'validation'=>array(            
                    array(
                            'type'=>'inarray',
                            'error'=>'No esta en la lista de opciones',
                            'options'=>array()
                        ),                  
        ),
    ),
);