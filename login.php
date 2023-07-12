<?php
// Step 1: Establish database connection

include("./database.php");

// Step 3: Retrieve user credentials

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    $password = $_POST['cpass'];

    

    // Step 4: Hash the entered password

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Step 5: Compare hashed passwords

   $query = "SELECT PASSWORD FROM user WHERE username = '$username'";
   //$queery = "SELECT * FROM `user` WHERE username = 'kebe'";

    $result = mysqli_query($conn, $query);
    

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        //echo $row['password'];
        $storedHashedPassword = $row['password'];

        if (password_verify($Password, $storedHashedPassword)) {
            // Passwords match, user is authenticated

            // Step 6: Start session and set logged-in user information
            session_start();
            $_SESSION['username'] = $username;

            // Redirect to another page
            header("Location: cart.html");
            exit();
        } else {
            // Invalid password
            echo "Invalid password!";
        }
    } else {
        // User not found
        echo "User not found!";
    }
}

// Close the database connection
?>
