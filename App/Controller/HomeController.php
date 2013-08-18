<?php
namespace App\Controller;

use App\Controller;
use App\Model;

class HomeController extends AppController {
    
     protected $Home;


     public function __construct()
    {
        parent::__construct();
        
        $this->Home = new \App\Model\Home();
    }
    
    /**
     * 
     */
    public function index()
    {
        echo 'Estou no index';
        
        $this->render(__FUNCTION__);
    }
    
    /**
     * 
     * @param type $param
     * @param type $param2
     */
    public function teste( $param = null , $param2 = null) 
    {
        $this->param = $param;
        $this->secondParam = $param2;
        
        $this->Home->save(array('id' => 3, 'nome' => 'tewste'));
        
        
        $this->render(__FUNCTION__);
    }
}
