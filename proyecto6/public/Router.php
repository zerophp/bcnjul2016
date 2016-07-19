<?php

/**
 * Router
 * /                                module=application, controller=index, action=index
 * /user                            module=user, controller=index, action=index
 * /user/crud                       module=user, controller=crud, action=index
 * /user/crud/insert                module=user, controller=crud, action=insert
 * /user/crud/update/iduser/2       module=user, controller=crud, action=update, params=array(iduser=>2)
 * /user/crud/update/iduser/2/pram2/value2   module=user, controller=crud, action=update, params=array(iduser=>2, param2=>value2)
 * /user/kaka                       404
 * /user/crud/kaka                  404
 * /user/crud/update/iduser         404
 * /user/crud/update/iduser/kaka    404
 * /kaka                            404
 * /user/crud/insert/kaka/kaka2     404 --------<MMMMHHHH>    
 * 
 * 
 * @param string $url
 * @return array
 */
function Router($url)
{
    $url = explode("/", $url);
    
    $router = array('module'=>$url[1],
                    'controller'=>$url[2],
                    'action'=>$url[3] 
                    'params'=>array()
    );
    
    return $router;
}