<?php 
namespace Users\Controller;

class Crud
{
    public function insert()
    {
        
    }
    
    public function update()
    {
    
    }
    
    public function delete()
    {
    
    }
    
    public function select($db)
    {
        $link = ConnectDb($db['slave']);
        $datas = getDatasDatabase($link, 'users');
        CloseDb($link);
        ob_start();
            echo DibujaTabla($datas);
            $view = ob_get_contents();
        ob_end_clean();
    }
    
}
