<?php
namespace Andrebian\DI;
use App\Config\Database;

class DataSource
{
    public function query( $query )
    {
        new \App\Config\Database();
        //provisoriamente !!!!
        mysql_query($query) or die(mysql_error());
    }
}
