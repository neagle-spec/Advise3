<?php
//Turn on error reporting
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

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