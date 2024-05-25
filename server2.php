<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Initializing variables
$db_user = "root";
$db_password = "";
$host = 'localhost';
$db_name = 'csbs';
$errors = array(); 

// Establishing database connection
$connection = mysqli_connect($host, $db_user, $db_password, $db_name);

// Check connection
if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Handling form submission
if (isset($_POST['Sign_Up'])) {
    // Receiving input values from the form
    $REG = mysqli_real_escape_string($connection, $_POST['REG']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password_1 = mysqli_real_escape_string($connection, $_POST['PASSWORD_1']);
    $password_2 = mysqli_real_escape_string($connection, $_POST['PASSWORD_2']);
  
    // Form validation
    if (empty($REG)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
  
    // Checking if the user already exists
    $user_check_query = "SELECT * FROM csbs WHERE REG=? LIMIT 1";
    $stmt = mysqli_prepare($connection, $user_check_query);
    mysqli_stmt_bind_param($stmt, 's', $REG);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
        if ($user['REG'] === $REG) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }
  
    // Register user if there are no errors
    if (count($errors) == 0) {
        // Hashing the password
        $PASSWORD = password_hash($password_1, PASSWORD_DEFAULT);

        // Inserting data into the database
        $insert_query = "INSERT INTO csbs (REG, email, PASSWORD) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $insert_query);
        mysqli_stmt_bind_param($stmt, 'sss', $REG, $email, $PASSWORD);
        
        if (mysqli_stmt_execute($stmt)) {
            // Starting session
            session_start();
            
            // Setting session variables
            $_SESSION['REG'] = $REG;
            $_SESSION['success'] = "You are now registered and logged in";
            
            // Redirecting to a success page or dashboard
            header('location: library.php');
            exit(); // Ensure script stops after redirection
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
        }

        // Closing the statement
        mysqli_stmt_close($stmt);
    }
}

// Closing the database connection
mysqli_close($connection);
?>
