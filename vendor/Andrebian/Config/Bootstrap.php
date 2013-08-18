<?php
namespace Andrebian\Config;

class Bootstrap
{
    public function __construct()
    {
        $route = new \Andrebian\Config\Route();
        $route->go();
    }
    
}
