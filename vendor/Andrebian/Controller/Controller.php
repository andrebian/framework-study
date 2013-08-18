<?php
namespace Andrebian\Controller;
use Andrebian\Model;


class Controller
{
    protected  $action;
    protected $model;



    public function __construct()
    {
        $model = str_replace('Controller', 'Model', get_class($this));
        $modelName = end(explode('\\', $model));
        
        $this->model = $modelName;
        
    }
    
    
    public function layout( $html = 'default' )
    {
        $layout = '../App/View/Layout/' . $html . '.phtml';
        
        if (file_exists($layout) ) {
            include_once $layout;
        } else {
            include_once '../App/View/Layout/default.phtml';
        }
    }
    
    public function render( $view, $layout = true, $layoutName = 'default' ) 
    {
        $this->action = $view;
        $class = str_replace('Controller', 'View', get_class($this));
        
        $viewFile = '../' . str_replace('\\', '/', $class) . '/' . $view . '.phtml';
        
        if ( $layout && file_exists('../App/View/Layout/default.phtml') ) {
            include_once '../App/View/Layout/' . $layoutName . '.phtml';
        } else {
            $this->content();
        }
    }
    
    
    protected function content() {
        
        $class = str_replace('Controller', 'View', get_class($this));
        
        $viewFile = '../' . str_replace('\\', '/', $class) . '/' . $this->action . '.phtml';
       
        include_once $viewFile;
    }
}

?>
