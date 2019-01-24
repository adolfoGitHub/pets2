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
$f3->route('GET /', function()
{
    echo "<h1>My Pets</h1>";
    echo '<a href="order">Order a Pet</a>';



});

//define a route with a parameter

$f3->route('GET /@pets2', function($f3,$params)
{
    //print_r($params);
    $validPets = ['dog', 'cat', 'fish', 'snake','bird', 'owl', 'mouse'];
    $pet= $params['animal'];

    //check validity
    if(!in_array($pet, $validPets))
    {
        echo "<h3>Sorry, you don't have a pet, you have a problem!</h3>";
    }
    else {
        switch ($pet) {
            case 'dog':
                echo "Woof!";
                break;
            case 'cat':
                echo "Meow!";
                break;
            case 'fish':
                echo "Bubble!";
                break;
            case 'snake':
                echo "ssSss!";
                break;
            case 'bird':
                echo "Tweet!";
                break;
            case 'owl':
                echo "Who!";
                break;
            case 'mouse':
                echo "Squeak!";
                break;
        }
    }
                //echo "<h3>I like ". $params['animal']."</h3>";
});

//Define a route to display order form 1
$f3->route('GET /order', function()
{
    $view = new View();
    echo $view->render('views/form1.html');

});

//Define a route to display order form 2
$f3->route('POST /order2', function()
{

    $_SESSION['animal'] = $_POST['animal'];

    $view = new View();
    echo $view->render('views/form2.html');

});

//Define a route to process order
$f3->route('POST /results', function($f3){

    $validColors = ['brown', 'black', 'green', 'blue','yellow'];
    $color = $_SESSION['color'];

    //check validity
    if(!in_array($color, $validColors))
    {
        echo "<h3>Sorry, that is not a valid color!</h3>";
    }
    //setting chosen color
    $_SESSION['color'] = $_POST['color'];

    $template = new Template();
    echo $template->render('views/results.html');

});
//run fat free framework
$f3->run();