<?php

// initializing variables
$REG = "";
$email    = "";
$errors = array(); 

$host = 'localhost'; // Change this to your actual MySQL server hostname or IP address
$REG = 'root'; // Change this to your MySQL REG
$Password = ''; // Change this to your MySQL PASSWORD
$dbname = 'csbs'; // Change this to the name of your database

$connection = mysqli_connect($host, $REG, $Password, $dbname);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $REG = mysqli_real_escape_string($connection, $_POST['REG']);
    $PASSWORD = mysqli_real_escape_string($connection, $_POST['PASSWORD']);
  
    if (empty($REG)) {
        array_push($errors, "Username is required");
    }
    if (empty($PASSWORD)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $query = "SELECT * FROM csbs WHERE REG='$REG' AND PASSWORD ='$PASSWORD'";
        $results = mysqli_query($connection, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['REG'] = $REG;
          $_SESSION['success'] = "You are now logged in";
          header('location: library.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  

// REGISTER USER

  
if (count($errors) > 0) {
    echo '<div style="background-color: #ff9999; padding: 10px;     top: 0;
    left: 0;    position: absolute;
    top: 0;
    left: 0;
    background-color: #ff9999;
    padding: 10px;
    text-align: center;
    width: 100%; /* Makes the element span the full width of its containing element */
    z-index: 1; /* Ensures the eleme">';
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    echo '</div>';
}
?>
