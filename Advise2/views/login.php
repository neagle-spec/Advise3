<?php

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

// Initialize variables
$un = "";
$validLogin = true;

// If the user is already logged in
if (isset($_SESSION['username'])){

    // Redirect to home page
    header("location: index.php");
}

// If the form has been submitted
if (!empty($_POST)){

    // Get the form data
    $un = $_POST['username'];
    $pw = $_POST['password'];

    // Require the credentials file, which defines a $logins array
    require('creds.php');

    // If the username is in the array and the passwords match
    if (array_key_exists($un, $logins) && $pw == $logins[$un]){

        // Record the username in the session array
        $_SESSION['username'] = $un;

        // Go to the page that the user came from, or else the home page
        $page = isset($_SESSION['page']) ? $_SESSION['page'] : "index.php";
        header('location: '.$page);
    }

    // Invalid login -- set flag variable
    $validLogin = false;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .err {
            color: darkred;
        }
    </style>
    <!-- stylesheet-->
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
<div class="container">

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home">Home</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="login">Login</a></li>
                </ul>
            </div>
        </nav>


    <h1>Login Page</h1>

    <form action="#" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="admin" name="username"
                    value="<?php echo $un; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="admin" name="password" >
        </div>
        <?php
            if(!$validLogin){
                echo '<p class="err">Login is incorrect</p>';
            }
        ?>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>