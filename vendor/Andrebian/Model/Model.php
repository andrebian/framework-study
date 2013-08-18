<?php
namespace Andrebian\Model;



class Model
{
    
    public function save( $data = array(), $model = null )
    {
        $table = strtolower(str_replace('App\Model\\', '', get_class($this)));
        
        $stringToSave = 'INSERT INTO ' . $table . ' SET ';
        
        $cont = 0;
        $final = ', ';
        foreach( $data as $key => $value ) {
            $cont++;
            
            if ( $cont >= count($data) ) {
                $final = '';
            }
            $stringToSave .= $key . '=' . '\''.$value.'\'' . $final;
        }
        
        $this->query($stringToSave);
    }
    
    
    public function find( $conditions = array(), $model = null )
    {
        
    }
    
    
    public function delete( $id, $model = null)
    {
        
    }
    
    
    public function query( $query ) 
    {
        $dataSource = new \Andrebian\DI\DataSource();
        $dataSource->query($query);
    }
}
