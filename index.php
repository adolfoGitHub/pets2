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
    echo "<h1>My Pets</h1>";
    echo '<a href="order">Order a Pet</a>';

});



//run fat free framework
$f3->run();