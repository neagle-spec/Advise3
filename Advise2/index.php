<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

// define constants
define("DB_DSN", "mysql:dbname-aneagleg_capstone");
define("DB_USERNAME", "aneagleg_capstone");
define("DB_PASSWORD", "Dev.101488");

try{
    // connect to db
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo "Connected!";
}
catch (PDOException $e){
    echo $e->getMessage();
}
// Require the necessary files
require_once('vendor/autoload.php');

//Create an instance of the base class
$f3 = Base::instance();

//Create an instance of the Controller class
//$con = new Controller($f3);

//Define a default route
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

//Define a plan route
$f3->route('GET|POST /plan', function () {
    $view = new Template();
    echo $view->render('views/plan.html');
});

$f3->route('GET|POST /home', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /admin', function () {
    $view = new Template();
    echo $view->render('views/admin.php');
});

$f3->route('GET|POST /login', function () {
    $view = new Template();
    echo $view->render('views/login.php');
});


//Run fat-free
$f3 ->run();