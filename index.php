<?php
//start sessions
session_start();

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload
require_once('vendor/autoload.php');

//create an instance of the BASE CLASS
$f3 = Base::instance();

//turn on fat-free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET /', function(){

    $view = new View;
    echo $view->render('views/home.html');
});

//define a route with a parameter
$f3->route('GET /@pets2', function( $params){
    print_r($params);
    echo "<h3>I like ". $params['animal']."</h3>";
});

//run fat free framework
$f3->run();