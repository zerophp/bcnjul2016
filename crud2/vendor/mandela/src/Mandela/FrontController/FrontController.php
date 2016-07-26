<?php
namespace Mandela\FrontController;

Class FrontController
{
    static $router;    
    
    static public function Config($config)
    {
        $filename = "configs/autoload/".$config;
       
        $config = null;
        

        if(file_exists($filename))
        {
            include_once $filename;            
        }

        return $config;
    }
    
    static public function Dispatch($router)
    {
    
        $classname = ucfirst($router['module'])."\Controller\\".
            ucfirst($router['controller']);
    
            $class = new $classname();
            $view = $class->{$router['action']}();
    
            return array('layout'=>$class->layout,
                'view'=>$view);
    }
    
    static public function Render($render)
    {
        $content = $render['view'];
    
        //     ob_start();
        //         include('../modules/users/views/layouts/partials/menu.phtml');
        //         $menu = ob_get_contents();
        //     ob_end_clean();
    
        ob_start();
        include('../modules/users/views/layouts/partials/navigator.phtml');
        $navigator = ob_get_contents();
        ob_end_clean();

        
        $filename = "/modules/".strtolower(self::$router['module'])."/views/layouts/".$render['layout'].".phtml";
        
        ob_start();
        include($filename);
        $layout = ob_get_contents();
        ob_end_clean();
    
        return $layout;
    
    }
    
    
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
     * @param string $url
     * @return array
     */
    static public function Router($url = "/", $base=array())
    {
    
//         $validAction = array(
//             'application' => array(
//                 'Index'=>array('index')
//             ),
//             'users' => array(
//                 'crud'=>array('index','select','insert','update','delete')
//             )
//         );
    
        $url = explode("/", $url);
       
        $default = $base['default'];
        if(isset($url[1]) && strlen($url[1])>0){
            $default = isset($base['routes']['/'.$url[1]]) ? $base['routes']['/'.$url[1]] : $default;
        }
    
        
        echo "<pre>url: ";
        print_r($url);
        echo "</pre>";
        
//         echo "<pre>default: ";
//         print_r($default);
//         echo "</pre>";
        
        $router = array('module'=>'','controller'=>'','action'=>'','params'=>array());
    
        // Modules
        $module_ok = false;
        if(isset($url[1]) && strlen($url[1])>0 && file_exists('modules/'.$url[1]))
        {
//             echo "--2--";
            $router['module'] = $url[1];
            $module_ok = true;
        }
        else
        {
//             echo "<pre>url: ";
//             print_r($url);
//             echo "</pre>";
//             echo "--22--";
            if(file_exists("modules/".$url[1]))
            {
//              echo "--22--";
                $ini = isset($default['module']) ? $default['module'] : 'index';
                
                
                
                
                if(file_exists('modules/'.$ini))
                {
//                     echo "--3--";
                    $router['module'] = $ini;
                    $module_ok = true;
                }
            }
           
        }
        
        
        
        // Controllers
        $controller_ok = false;
        if($module_ok)
        {
            $filename = 'modules/'.$router['module'].'/src/'.ucwords($router['module']).'/Controller/'.ucwords($url[2]).'Controller.php';
            
//             echo $filename;
            if(isset($url[2]) && strlen($url[2])>0 && file_exists($filename))
            {
                
                $router['controller'] = $url[2];
                $controller_ok = true;
            }
            else
            {
                $router = array('module' => 'error',
                             'controller' => 'ErrorController',
                             'action' => '_404action',
                             'params' => array());
                
                self::$router = $router;
                return $router;
                
                $ini = isset($default['controller']) ? $default['controller'] : 'index';
                $ruta = 'modules/'.$router['module'].'/src/'.ucwords($router['module']).'/Controller/'.ucwords($ini).'Controller.php';
                
               
                if(file_exists($ruta))
                {
               
                    $router['controller'] = $ini;
                    $controller_ok = true;
                }
            }
        }
        
        // Actions
        $action_ok = false;
        if($controller_ok)
        {

            $action =  get_class_methods($router['controller']);
            	
            $fqn = ucfirst($router['module'])."\\Controller\\".ucfirst($router['controller'])."Controller";
//             echo $fqn;
            $me = get_class_methods($fqn);
            
//             echo "<pre>me: ";
//             print_r($me);
//             echo "</pre>";
            
            $actions=[];
            foreach ($me as $actionss)
            {
                if(strpos($actionss, 'Action')>0)
                    $actions[]=$actionss;
            
            }
            	
//             echo "<pre>";
//             print_r($actions);
//             echo "</pre>";
            
            
            if(isset($url[3]) && strlen($url[3])>0 && in_array(
                $url[3].'Action',
                $actions
                ))
            {
                echo "--1--";
                $router['action'] = $url[3];
                $action_ok = true;
                 
            } else {
                echo "--2--";
                
                $fqn = ucfirst($router['module'])."\\Controller\\".ucfirst($router['controller'])."Controller";
                
                echo $fqn;
                $me = get_class_methods($fqn);
                
                $actions=[];
                foreach ($me as $actionss)
                {
                    if(strpos($actionss, 'Action')>0)
                        $actions[]=$actionss;
                        
                }
                
 
      
      
                echo "<pre>default: ";
                print_r($default);
                echo "</pre>";
//                 $action;
                
                $ini = isset($default['action']) ? $default['action'] : 'index';

                echo $ini;
                
                //$ruta = '../modules/'.$url[1].'/src/'.ucwords($url[1]).'/Controller/'.ucwords('index').'.php';
//                 if(in_array($ini, $validAction[$router['module']][$router['controller']]))
                if(in_array($ini."Action", $actions))
                //if(strlen($url[3])>0) //file_exists($ruta)
                {
                    echo "---2--";
                    $router['action'] = $ini;
                    $action_ok = true;
                }
            }
        }
    
        // Params
        $params_ok = true;
        if($action_ok)
        {
            echo "--ss--";
            if(count($url) > 4)
            {
                for($elm=4; $elm<count($url) && $params_ok;$elm+=2)
                {
                    if(isset($url[$elm+1]) && strlen($url[$elm+1])>0)
                    {
                        $router['params'][$url[$elm]] = $url[$elm+1];
                    }
                    else
                    {
                        $params_ok = false;
                        $router['params'] = array();
                    }
                }
            }
        }
        echo "<pre>Pre error:";
        print_r($router);
        echo "</pre>";
        /// al 404
        if(!$module_ok || !$controller_ok || !$action_ok || !$params_ok)
        {
            $router['module'] = 'Error';
            $router['controller'] = 'Error';
            $router['action'] = '_404';
            $router['params'] = array();
        }
    
        $router['controller'].='Controller';
        $router['action'].='action';
        
        self::$router = $router;
        
        return $router;
    }
}