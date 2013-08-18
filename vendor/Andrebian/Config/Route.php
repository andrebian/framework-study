<?php
namespace Andrebian\Config;

class Route
{
    
    protected $controller = 0;
    protected $action = 1;
    protected $param1 = 2;
    protected $param2 = 3;

    
    public function go($url)
    {
        $this->run($this->_parseUrl($url));
    }
    
    
    /**
     * 
     * 
     * @param type $url
     * @return type
     */
    protected function _parseUrl( $url )
    {
        $pattern = '#([a-zA-Z0-9\/]+)(\?.*)?#';
        $url = preg_replace($pattern, '$1', $_SERVER['REQUEST_URI']);
        
        $url = explode('/', $url);
        $url = array_filter($url);
        $url = array_values($url);
        
        return $url;
    }
    
    
    /**
     * Vai a um controller e action específica
     * 
     * @param array $url
     */
    protected  function run($url) {
       
            $controller = $url[$this->controller] ? $url[$this->controller] : 'home';

            $class = "App\\Controller\\".ucfirst($controller).'Controller';
            
            if (!class_exists($class) ) {
                echo 'Controller n&atilde;o localizado';
                exit();
            }
            $controller = new $class;

            $action = isset($url[$this->action]) ? $url[$this->action] : 'index';
            
            if ( !method_exists($controller, $action) ) {
                echo 'M&eacute;todo n&atilde;o localizado';
                exit();
            }
            
            $param1 = $url[$this->param1] ? $url[$this->param1] : '';
            $param2 = $url[$this->param2] ? $url[$this->param2] : '';
           
            $controller->$action( $param1, $param2 );
       
    }
    
}
