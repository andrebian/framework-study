<?php

error_reporting(E_ALL);


require_once '../vendor/SplClassLoader.php';

$splClassLoader = new SplClassLoader('Andrebian', '../vendor');
$splClassLoader->register();

$splClassLoader = new SplClassLoader('App', '../');
$splClassLoader->register();


require_once '../App/Config/Bootstrap.php';
$bootstrap = new \App\Config\Bootstrap();
