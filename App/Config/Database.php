<?php
namespace App\Config;


class Database
{
    public function __construct()
    {
        var_dump('asdfksada');
        mysql_connect('localhost', 'root', 'masterkey');
        mysql_select_db('cake_test');
    }
}

?>
